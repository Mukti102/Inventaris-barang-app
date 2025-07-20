<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthlySummariesController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan ?? 1;

        $rekapHarian = [];

        // Jika bulan tidak dipilih, arahkan kembali (karena rekap harian hanya logis jika bulan dipilih)
        if (!$bulan) {
            return redirect()->back()->with('error', 'Silakan pilih bulan untuk melihat rekap harian.');
        }

        $startDate = Carbon::createFromDate($tahun, $bulan, 1);
        $endDate = $startDate->copy()->endOfMonth();

        $sisaStok = 0;

        while ($startDate->lte($endDate)) {
            $tanggal = $startDate->format('Y-m-d');

            $pengadaan = DB::table('procruments')
                ->whereDate('tanggal_pengadaan', $tanggal)
                ->sum('jumlah_barang');

            $pengeluaran = DB::table('distributions')
                ->whereDate('tanggal_pengeluaraan', $tanggal)
                ->sum('jumlah');

            $pengeluaranKeuangan = DB::table('financial_reports')
                ->whereDate('created_at', $tanggal)
                ->sum('total_anggaran');

            // Update sisa stok berjalan
            $sisaStok += $pengadaan - $pengeluaran;

            $rekapHarian[] = [
                'tanggal' => $startDate->translatedFormat('d F Y'),
                'jumlah_pengadaan' => $pengadaan,
                'jumlah_pengeluaran' => $pengeluaran,
                'total_pengeluaran_keuangan' => $pengeluaranKeuangan,
                'sisa_stok' => $sisaStok,
            ];

            $startDate->addDay();
        }

        return view('pages.report.index', [
            'rekapHarian' => $rekapHarian,
            'tahun' => $tahun,
            'bulanFilter' => $bulan,
        ]);
    }



    public function print(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan;

        $rekapHarian = [];

        // Jika bulan tidak dipilih, arahkan kembali (karena rekap harian hanya logis jika bulan dipilih)
        if (!$bulan) {
            return redirect()->back()->with('error', 'Silakan pilih bulan untuk melihat rekap harian.');
        }

        $startDate = Carbon::createFromDate($tahun, $bulan, 1);
        $endDate = $startDate->copy()->endOfMonth();

        $sisaStok = 0;

        while ($startDate->lte($endDate)) {
            $tanggal = $startDate->format('Y-m-d');

            $pengadaan = DB::table('procruments')
                ->whereDate('tanggal_pengadaan', $tanggal)
                ->sum('jumlah_barang');

            $pengeluaran = DB::table('distributions')
                ->whereDate('tanggal_pengeluaraan', $tanggal)
                ->sum('jumlah');

            $pengeluaranKeuangan = DB::table('financial_reports')
                ->whereDate('created_at', $tanggal)
                ->sum('total_anggaran');

            // Update sisa stok berjalan
            $sisaStok += $pengadaan - $pengeluaran;

            $rekapHarian[] = [
                'tanggal' => $startDate->translatedFormat('d F Y'),
                'jumlah_pengadaan' => $pengadaan,
                'jumlah_pengeluaran' => $pengeluaran,
                'total_pengeluaran_keuangan' => $pengeluaranKeuangan,
                'sisa_stok' => $sisaStok,
            ];

            $startDate->addDay();
        }
        $pdf = Pdf::loadView('pages.report.print', compact('rekapHarian', 'tahun', 'bulan'));
        return $pdf->stream('rekapitulasi-' . $tahun . ($bulan ? '-' . $bulan : '') . '.pdf');
    }
}
