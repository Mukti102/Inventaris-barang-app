<?php

namespace App\Http\Controllers;

use App\Models\FinancialReport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financialReports = FinancialReport::all();
        return view('pages.financialReport.index', compact('financialReports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.financialReport.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'periode'            => 'required|in:bulanan,tahunan',
            'total_anggaran'     => 'required',
            'total_realisasi'    => 'required',
            'bulan_periode'      => 'required',
            'rincian_transaksi'  => 'required|string',
        ]);

        try {
            // Hitung selisih
            $selisih = $request->total_anggaran - $request->total_realisasi;

            FinancialReport::create([
                'periode'           => $request->periode,
                'bulan_periode'     => $request->bulan_periode,
                'total_anggaran'    => $request->total_anggaran,
                'total_realisasi'   => $request->total_realisasi,
                'selisih'           => $selisih,
                'rincian_transaksi' => $request->rincian_transaksi,
            ]);

            return redirect()->route('financialreport.index')->with('success', 'Laporan berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancialReport $financialReport)
    {
        return view('pages.financialReport.show', compact('financialReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinancialReport $financialReport)
    {
        return view('pages.financialReport.edit', compact('financialReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, FinancialReport $financialReport)
    {
        $financialReport = FinancialReport::find($id);
        $request->validate([
            'periode'            => 'required|in:bulanan,tahunan',
            'total_anggaran'     => 'required',
            'total_realisasi'    => 'required',
            'bulan_periode'      => 'required',
            'rincian_transaksi'  => 'required|string',
        ]);

        try {
            
            $selisih = $request->total_anggaran - $request->total_realisasi;
            $financialReport->update([
                'periode'           => $request->periode,
                'bulan_periode'     => $request->bulan_periode,
                'total_anggaran'    => $request->total_anggaran,
                'total_realisasi'   => $request->total_realisasi,
                'selisih'           => $selisih,
                'rincian_transaksi' => $request->rincian_transaksi,
            ]);

            return redirect()->route('financialreport.index')->with('success', 'Laporan berhasil diperbarui.');
        } catch (Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat mengupdate data.')->withInput();
        }
    }

     public function print()
    {
        $items = FinancialReport::orderBy('total_anggaran', 'asc')->get();

        // Load view dan convert ke PDF
        $pdf = Pdf::loadView('pages.financialReport.print', compact('items'));

        return $pdf->stream('financial-report' . '.pdf');


    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialReport $financialReport, $id)
    {
        $financialReport = FinancialReport::find($id);
        try {
            $financialReport->delete();
            return redirect()->route('financialreport.index')->with('success', 'Laporan berhasil dihapus.');
        } catch (Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menghapus data.');
        }
    }
}
