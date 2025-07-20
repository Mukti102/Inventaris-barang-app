<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use App\Models\Item;
use App\Models\ReportItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    public function index()
    {
        $distributions = Distribution::with('item')->get();
        return view('pages.distribution.index', compact('distributions'));
    }

    public function print(){
        
        $items = Distribution::with('item')->orderBy('tanggal_pengeluaraan', 'asc')->get();

        // Load view dan convert ke PDF
        $pdf = Pdf::loadView('pages.distribution.print', compact('items'));

        return $pdf->stream('inentaris-barang' .'.pdf');
    }

    public function create()
    {
        $items = Item::all();
        return view('pages.distribution.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengeluaran' => 'required|date',
            'item_id'             => 'required',
            'jumlah'              => 'required|integer|min:1',
            'unit_penerima'       => 'required|string',
            'petugas_penyerah'    => 'required|string',
        ]);

        try {
            $item = Item::findOrFail($request->item_id);
            
         
            
            Distribution::create([
                'tanggal_pengeluaraan' => $request->tanggal_pengeluaran,
                'item_id'             => $request->item_id,
                'jumlah'              => $request->jumlah,
                'unit_penerima'       => $request->unit_penerima,
                'petugas_penyerah'    => $request->petugas_penyerah,
            ]);

            if ($item->stok < $request->jumlah) {
                return back()->withErrors('Stok barang tidak mencukupi.')->withInput();
            }

            $item->stok -= $request->jumlah;
            $item->save();

            $this->updateReportItem($request->item_id);

            return redirect()->route('distribution.index')->with('success', 'Distribusi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Distribution $distribution)
    {
        $distribution->load('item');
        return view('pages.distribution.show', compact('distribution'));
    }

    public function edit(Distribution $distribution)
    {
        $items = Item::all();
        return view('pages.distribution.edit', compact('distribution', 'items'));
    }

    public function update(Request $request, Distribution $distribution)
    {
        $request->validate([
            'tanggal_pengeluaran' => 'required|date',
            'item_id'             => 'required|exists:items,id',
            'jumlah'              => 'required|integer|min:1',
            'unit_penerima'       => 'required|string',
            'petugas_penyerah'    => 'required|string',
        ]);

        try {
            $itemOld = Item::findOrFail($distribution->item_id);
            $itemNew = Item::findOrFail($request->item_id);

            // Kembalikan stok lama
            $itemOld->stok += $distribution->jumlah;
            $itemOld->save();

            // Kurangi stok baru
            if ($itemNew->stok < $request->jumlah) {
                return back()->withErrors('Stok barang tidak mencukupi.')->withInput();
            }

            $itemNew->stok -= $request->jumlah;
            $itemNew->save();

            $distribution->update([
                'tanggal_pengeluaraan' => $request->tanggal_pengeluaran,
                'item_id'             => $request->item_id,
                'jumlah'              => $request->jumlah,
                'unit_penerima'       => $request->unit_penerima,
                'petugas_penyerah'    => $request->petugas_penyerah,
            ]);

            // Update report untuk kedua item (jika berbeda)
            $this->updateReportItem($itemOld->id);
            if ($itemOld->id !== $itemNew->id) {
                $this->updateReportItem($itemNew->id);
            }

            return redirect()->route('distribution.index')->with('success', 'Distribusi berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Distribution $distribution)
    {
        try {
            $item = Item::findOrFail($distribution->item_id);
            $item->stok += $distribution->jumlah;
            $item->save();

            $distribution->delete();

            $this->updateReportItem($item->id);

            return redirect()->route('distribution.index')->with('success', 'Distribusi berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Update record di tabel report_items sesuai item_id.
     */
    protected function updateReportItem($itemId)
    {
        $reportItem = ReportItem::where('item_id', $itemId)->first();
        if (!$reportItem) return;

        $stockAwal = (int) $reportItem->stock_awal;

        $jumlahPemasukkan = \App\Models\Procrument::where('item_id', $itemId)
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
