<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\PaguAnggaran;
use App\Models\Procrument;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanPengeluaranController extends Controller
{
    public function index()
    {
        return view('pages.laporanAnggaran.index');
    }

    public function perYear(Request $request)
    {
        $year = $request->input('year', date('Y'));

        $procruments = Procrument::with(['item.category'])->whereYear('tanggal_pengadaan', $year)->get();

        $result = $procruments->map(function ($proc) {
            $category = optional($proc->item)->category;
            $pagu = PaguAnggaran::where('category_id', optional($category)->id)->first();
            $nilaiPagu = optional($pagu)->nilai ?? 0;

            $bulan = Carbon::parse($proc->tanggal_pengadaan)->month;
            $semester1 = $bulan <= 6 ? $proc->total_biaya : 0;
            $semester2 = $bulan >= 7 ? $proc->total_biaya : 0;

            $realisasi = $semester1 + $semester2;

            return [
                'kode_rekening' => $pagu->kode_rekening ?? '5.0.8.019',
                'dpa' => $nilaiPagu,
                'kegiatan' => optional($category)->name ?? '-',
                'pagu' => $nilaiPagu,
                'semester1' => $semester1,
                'semester1_persen' => $nilaiPagu > 0 ? round(($semester1 / $nilaiPagu) * 100, 2) : 0,
                'semester2' => $semester2,
                'semester2_persen' => $nilaiPagu > 0 ? round(($semester2 / $nilaiPagu) * 100, 2) : 0,
                'realisasi' => $realisasi,
                'realisasi_persen' => $nilaiPagu > 0 ? round(($realisasi / $nilaiPagu) * 100, 2) : 0,
            ];
        });

        $pdf = Pdf::loadView('pages.laporanAnggaran.anggaranPertahun', compact('result', 'year'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('pengeluaran-anggaran-pertahun.pdf');
    }

    public function categoryReport($id)
    {
        $category = Category::findOrFail($id);

        $procruments = Procrument::with('item')->whereHas('item', function ($q) use ($id) {
            $q->where('category_id', $id);
        })->get();

        $result = $procruments->map(function ($proc) {
            $item = $proc->item;
            $pagu = PaguAnggaran::where('category_id', $item->category_id)->first();
            $nilaiPagu = optional($pagu)->nilai ?? 0;

            $realisasi = Procrument::where('item_id', $item->id)->sum('total_biaya');
            $realisasiPercentage = $nilaiPagu > 0 ? ($realisasi / $nilaiPagu) * 100 : 0;
            $sisa = $nilaiPagu - $realisasi;
            $sisaPercentage = $nilaiPagu > 0 ? ($sisa / $nilaiPagu) * 100 : 0;

            return [
                'pagu' => $nilaiPagu,
                'kegiatan' => $proc ?? '-',
                'realisasi' => $realisasi,
                'realisasiPercentage' => round($realisasiPercentage, 2),
                'sisa' => $sisa,
                'sisaPercentage' => round($sisaPercentage, 2),
            ];
        });

        $pdf = Pdf::loadView('pages.laporanAnggaran.anggaranPercategory', compact('result', 'category'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('pengeluaran-anggaran-' . Str::slug($category->name) . '.pdf');
    }

    public function reportPermonth()
    {
        $year = date('Y');

        $procruments = Procrument::with(['item.category'])->whereYear('tanggal_pengadaan', $year)->get();

        // Inisialisasi bulan
        $bulanMap = [
            'januari' => 1,
            'februari' => 2,
            'maret' => 3,
            'april' => 4,
            'mei' => 5,
            'juni' => 6,
            'juli' => 7,
            'agustus' => 8,
            'september' => 9,
            'oktober' => 10,
            'november' => 11,
            'desember' => 12
        ];

        $grouped = $procruments->groupBy(function ($item) {
            return $item->item->category_id ?? 'tanpa_kategori';
        });

        $result = $grouped->map(function ($group) use ($bulanMap) {
            $item = $group->first()->item ?? null;
            $category = optional($item)->category;
            $pagu = PaguAnggaran::where('category_id', optional($category)->id)->first();
            $nilaiPagu = optional($pagu)->nilai ?? 0;

            $months = array_fill_keys(array_keys($bulanMap), 0);

            foreach ($group as $proc) {
                $bulan = strtolower(Carbon::parse($proc->tanggal_pengadaan)->translatedFormat('F'));
                $key = str_replace('é', 'e', Str::slug($bulan, ''));
                if (array_key_exists($key, $months)) {
                    $months[$key] += $proc->total_biaya;
                }
            }

            return [
                'kode_rekening' => $pagu->kode_rekening ?? '5.0.8.019',
                'dpa' => $nilaiPagu,
                'kegiatan' => optional($category)->name ?? '-',
                'bulan' => $months
            ];
        });

        $pdf = Pdf::loadView('pages.laporanAnggaran.anggaranBulanan', ['result' => $result->values()])
            ->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-anggaran-bulanan.pdf');
    }


    public function triwulan()
    {
        $year = $request->year ??  Carbon::now()->year;

        $semesters = [
            [
                'id' => 1,
                'semester' => 1,
                'name' => 'Januari - Maret',
                'tahun' => $year
            ],
            [
                'id' => 2,
                'semester' => 2,
                'name' => 'April - Juni',
                'tahun' => $year
            ],
            [
                'id' => 3,
                'semester' => 3,
                'name' => 'Juli - September',
                'tahun' => $year
            ],
            [
                'id' => 4,
                'semester' => 4,
                'name' => 'Oktober - Desember',
                'tahun' => $year
            ],
        ];

        return view('pages.laporanAnggaran.anggaranTriwulan', compact('semesters'));
    }


    public function triwulanPrint($id)
    {
        $year = date('Y');
        $procruments = Procrument::with(['item.category'])
            ->whereYear('tanggal_pengadaan', $year)
            ->get();

        // Range bulan tiap triwulan
        $triwulanRanges = [
            1 => [1, 2, 3],       // Januari - Maret
            2 => [4, 5, 6],       // April - Juni
            3 => [7, 8, 9],       // Juli - September
            4 => [10, 11, 12],    // Oktober - Desember
        ];

        // Nama bulan (untuk header PDF)
        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $selectedMonths = $triwulanRanges[$id] ?? [];

        // Ambil nama bulan dari nomor bulan
        $months = array_map(function ($m) use ($namaBulan) {
            return $namaBulan[$m];
        }, $selectedMonths);

        // Group by category
        $grouped = $procruments->filter(function ($proc) use ($selectedMonths) {
            $month = Carbon::parse($proc->tanggal_pengadaan)->month;
            return in_array($month, $selectedMonths);
        })->groupBy(function ($item) {
            return $item->item->category_id ?? 'tanpa_kategori';
        });

        $result = $grouped->map(function ($group) use ($selectedMonths, $namaBulan) {
            $item = $group->first()->item ?? null;
            $category = optional($item)->category;
            $pagu = PaguAnggaran::where('category_id', optional($category)->id)->first();
            $nilaiPagu = optional($pagu)->nilai ?? 0;

            // Inisialisasi total per bulan
            $bulan = [];
            foreach ($selectedMonths as $num) {
                $key = strtolower($namaBulan[$num]);
                $bulan[$key] = 0;
            }

            foreach ($group as $proc) {
                $monthNum = Carbon::parse($proc->tanggal_pengadaan)->month;
                if (in_array($monthNum, $selectedMonths)) {
                    $key = strtolower($namaBulan[$monthNum]);
                    $bulan[$key] += $proc->total_biaya;
                }
            }

            return array_merge([
                'kode_rekening' => $pagu->kode_rekening ?? '5.0.8.019',
                'dpa' => $nilaiPagu,
                'kegiatan' => optional($category)->name ?? '-',
            ], $bulan);
        });

        $periode = [
            1 => 'Januari - Maret',
            2 => 'April - Juni',
            3 => 'Juli - September',
            4 => 'Oktober - Desember',
        ][$id] ?? 'Triwulan Tidak Diketahui';

        $pdf = Pdf::loadView('pages.laporanAnggaran.anggaranTriwulanPrint', [
            'result' => $result->values(),
            'periode' => $periode,
            'months' => $months,
            'year' => $year,
            'id' => $id,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream("laporan-anggaran-triwulan-$periode.pdf");
    }
}
