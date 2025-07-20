<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FinancialReport;
use App\Models\PaguAnggaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaguAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = PaguAnggaran::with('category')->get();
        return view('pages.pagu.index', compact('items'));
    }


    public function print()
    {
        $items = PaguAnggaran::all();

        // Load view dan convert ke PDF
        $pdf = Pdf::loadView('pages.pagu.print', compact('items'));

        return $pdf->stream('laporan-pagu-anggaran' . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.pagu.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_anggaran' => 'required',
            'category_id' => 'required',
            'nilai' => 'required',
        ]);

        $validated['bulan'] = now()->format('Y-m');

        try {
            $paguAnggaran = PaguAnggaran::create($validated);
            $this->updateOrCreateFinancialReport($validated['bulan'], $request->nilai);
            return redirect()->route('pagu-anggaran.index')->with('success', 'Data Pagu berhasil ditambahkan.');
        } catch (Exception $e) {
            Log::info('Error Pagu Create', ['message' => $e->getMessage()]);
            return back()->withErrors('Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PaguAnggaran $paguAnggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paguAnggaran = PaguAnggaran::find($id);
        return view('pages.pagu.edit', compact('paguAnggaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaguAnggaran $paguAnggaran)
    {
        $request->validate([
            'tahun_anggaran' => 'required',
            'category_id' => 'required',
            'nilai' => 'required',
        ]);

        try {
            $paguAnggaran->update($request->all());

            $this->updateOrCreateFinancialReport($request->bulan, $request->nilai);

            return redirect()->route('pagu-anggaran.index')->with('success', 'Data Pagu berhasil diPerbarui.');
        } catch (Exception $e) {
            Log::info('Error Pagu Update', ['message' => $e->getMessage()]);
            return back()->withErrors('Terjadi kesalahan saat mengupdate data.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaguAnggaran $paguAnggaran)
    {
        try {
            // delete financial report 
            DB::transaction(function () use ($paguAnggaran) {
                $finnacialReport = FinancialReport::where('bulan_periode', $paguAnggaran->bulan)->delete();
                $paguAnggaran->delete();
            });

            return redirect()->route('pagu-anggaran.index')->with(
                'success',
                'Data Pagu berhasil diPerbarui.'
            );
        } catch (Exception $e) {
            Log::info('Error Pagu Delete', ['message' => $e->getMessage()]);
            return back()->withErrors('Terjadi kesalahan saat menghapus data.')->withInput();
        }
    }


    protected function updateOrCreateFinancialReport(string $bulan, int $nilai): void
    {
        DB::transaction(function () use ($bulan, $nilai) {

            // ➊ Buat kalau belum ada
            $report = FinancialReport::firstOrCreate(
                ['bulan_periode' => $bulan],      // kunci unik
                [                                 // hanya dipakai saat INSERT
                    'periode'           => 'tahunan',
                    'total_anggaran'    => $nilai,
                    'total_realisasi'   => 0,     // ← default awal
                    'selisih'           => $nilai,
                    'rincian_transaksi' => 'Tidak Ada',
                ]
            );

            // ➋ Kalau record sudah ada, cukup UPDATE field yang berubah
            if (! $report->wasRecentlyCreated) {
                $report->update([
                    'total_anggaran' => $nilai,
                    'selisih'        => $nilai - $report->total_realisasi,
                ]);
            }
        });
    }
}
