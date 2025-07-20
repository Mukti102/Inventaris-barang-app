<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Procrument;
use App\Models\ReportItem;
use App\Models\Distribution;
use App\Models\FinancialReport;
use App\Models\PaguAnggaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProcrumentController extends Controller
{
    public function index()
    {
        $data = Procrument::with('item')->get();
        return view('pages.penyedia.index', compact('data'));
    }

    public function create()
    {
        $items = Item::all();
        return view('pages.penyedia.create', compact('items'));
    }

    public function print()
    {
        $items = Procrument::with('item')->orderBy('nomor_pengadaan', 'asc')->get();
        $pdf = Pdf::loadView('pages.penyedia.print', compact('items'));
        return $pdf->stream('inventaris-barang.pdf');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_pengadaan'   => 'required|string',
            'tanggal_pengadaan' => 'required|date',
            'suplier_name'      => 'required|string',
            'item_id'           => 'required|exists:items,id',
            'jumlah_barang'     => 'required|integer|min:1',
            'total_biaya'       => 'required|numeric|min:0',
            'status'            => 'required|in:diterima,belum diterima',
        ]);

        $item = Item::find($request->item_id);

        $tanggal = Carbon::parse($validated['tanggal_pengadaan']);
        $bulanPagu = $tanggal->format('Y-m');


        $pagu = PaguAnggaran::where('category_id', $item->category_id)
            ->first();

        if (!$pagu) {
            Alert::error('Error', "Pagu Tidak Di Temukan");
            return back()->withErrors("Pagu Tidak Di Temukan")->withInput();
        }

        $realisasiBulanIni = Procrument::whereYear('tanggal_pengadaan', $tanggal->format('Y'))
            ->sum('total_biaya');

        if (($realisasiBulanIni + $validated['total_biaya']) > $pagu->nilai) {
            Alert::error("Gagal", "Pengadaan melebihi pagu bulan ini");
            return back()->withInput();
        }

        DB::transaction(function () use ($validated) {
            if ($validated['status'] === 'diterima') {
                $item = Item::findOrFail($validated['item_id']);
                $item->stok += $validated['jumlah_barang'];
                $item->save();
            }

            Procrument::create($validated);

            if ($validated['status'] === 'diterima') {
                $this->updateReportItem($validated['item_id']);
            }

            $this->updateFinancialReport(
                $validated['tanggal_pengadaan'],
                $validated['total_biaya']
            );
        });

        return redirect()->route('penyediaan.index')->with('success', 'Data pengadaan berhasil disimpan.');
    }

    public function show(Procrument $procrument)
    {
        return view('pages.penyedia.show', compact('procrument'));
    }

    public function edit(Procrument $procrument, $id)
    {
        $procrument = Procrument::find($id);
        $items = Item::all();
        return view('pages.penyedia.edit', compact('procrument', 'items'));
    }

    public function update(Request $request, Procrument $procrument, $id)
    {
        $procrument = Procrument::find($id);
        $validated = $request->validate([
            'nomor_pengadaan'   => 'required|string',
            'tanggal_pengadaan' => 'required|date',
            'suplier_name'      => 'required|string',
            'item_id'           => 'required|exists:items,id',
            'jumlah_barang'     => 'required|integer|min:1',
            'total_biaya'       => 'required|numeric|min:0',
            'status'            => 'required|in:diterima,belum diterima',
        ]);
        try {
            DB::transaction(function () use ($validated, $procrument) {
                $oldItem = Item::findOrFail($procrument->item_id);
                $newItem = Item::findOrFail($validated['item_id']);

                if ($procrument->status === 'diterima') {
                    $oldItem->stok -= $procrument->jumlah_barang;
                }

                if ($validated['status'] === 'diterima') {
                    $newItem->stok += $validated['jumlah_barang'];
                }

                $oldItem->save();
                if ($oldItem->id !== $newItem->id) {
                    $newItem->save();
                }

                $oldDate = Carbon::parse($procrument->tanggal_pengadaan)->format('Y-m');
                $newDate = Carbon::parse($validated['tanggal_pengadaan'])->format('Y-m');

                if ($oldDate !== $newDate) {
                    $oldReport = FinancialReport::where('bulan_periode', $oldDate)->first();
                    if ($oldReport) {
                        $oldReport->total_realisasi -= $procrument->total_biaya;
                        $oldReport->save();
                    }

                    $this->updateFinancialReport($validated['tanggal_pengadaan'], $validated['total_biaya']);
                } else {
                    $report = FinancialReport::where('bulan_periode', $newDate)->first();
                    if ($report) {
                        $report->total_realisasi -= $procrument->total_biaya;
                        $report->total_realisasi += $validated['total_biaya'];
                        $report->save();
                    }
                }

                $procrument->update($validated);

                if ($validated['status'] === 'diterima') {
                    $this->updateReportItem($validated['item_id']);
                }
            });

            return redirect()->route('penyediaan.index')->with('success', 'Data pengadaan berhasil diperbarui.');
        } catch (\Throwable $e) {
            return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Procrument $procrument, $id)
    {
        $procrument = Procrument::find($id);
        try {
            DB::transaction(function () use ($procrument) {
                $item = Item::findOrFail($procrument->item_id);

                if ($procrument->status === 'diterima') {
                    $item->stok -= $procrument->jumlah_barang;
                    $item->save();
                }

                $periode = Carbon::parse($procrument->tanggal_pengadaan)->format('Y-m');
                $report = FinancialReport::where('bulan_periode', $periode)->first();
                if ($report) {
                    $report->total_realisasi -= $procrument->total_biaya;
                    $report->selisih = $report->total_anggaran - $report->total_realisasi;
                    $report->save();
                }

                $procrument->delete();

                if ($procrument->status === 'diterima') {
                    $this->updateReportItem($item->id);
                }
            });

            return redirect()->route('penyediaan.index')->with('success', 'Data pengadaan berhasil dihapus.');
        } catch (\Throwable $e) {
            return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Helper
    protected function updateFinancialReport(string $tgl, float $nominal): void
    {
        $periode = Carbon::parse($tgl)->format('Y-m');
        $report = FinancialReport::firstOrNew(['bulan_periode' => $periode]);

        if (!$report->exists) {
            $report->total_anggaran = PaguAnggaran::where('bulan', Carbon::parse($tgl)->format('m'))
                ->where('tahun_anggaran', Carbon::parse($tgl)->format('Y'))
                ->value('nilai') ?? 0;

            $report->total_realisasi = 0;
            $report->rincian_transaksi = '0';
        }

        $report->total_realisasi += $nominal;
        $report->selisih = $report->total_anggaran - $report->total_realisasi;
        $report->save();
    }

    protected function updateReportItem($itemId)
    {
        $reportItem = ReportItem::where('item_id', $itemId)->first();
        if (!$reportItem) return;

        $stockAwal = (int) $reportItem->stock_awal;

        $jumlahPemasukkan = Procrument::where('item_id', $itemId)
            ->where('status', 'diterima')
            ->sum('jumlah_barang');

        $jumlahPengeluaran = Distribution::where('item_id', $itemId)->sum('jumlah');

        $reportItem->update([
            'jumlah_pemasukkan'  => $jumlahPemasukkan,
            'jumlah_pengeluaran' => $jumlahPengeluaran,
            'sisa_stok'          => $stockAwal + $jumlahPemasukkan - $jumlahPengeluaran,
        ]);
    }
}
