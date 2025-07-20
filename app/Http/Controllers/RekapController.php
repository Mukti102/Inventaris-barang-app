<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use App\Models\FinancialReport;
use App\Models\Item;
use App\Models\PaguAnggaran;
use App\Models\Procrument;
use App\Models\Request as RequestModel;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index()
    {
        return view('pages.laporan.index');
    }

    
    public function pagu()
    {   
        $items = PaguAnggaran::with('category')->get();
        return view('pages.laporan.rekapPagu',compact('items'));
    }



    public function item()
    {
        $items = Item::all();
        return view('pages.laporan.itemRekap', compact('items'));
    }


    public function itemPrint(Request $request)
    {
       
        $query = Item::query();

        if ($request->filled('from') && $request->filled('to')) {
            $from = Carbon::parse($request->from)->startOfDay(); // 00:00:00
            $to = Carbon::parse($request->to)->endOfDay();       // 23:59:59

            $query->whereBetween('created_at', [$from, $to]);
        }

        $items = $query->get();

        $pdf = Pdf::loadView('pages.items.print', compact('items'));

        return $pdf->stream('inventaris-barang.pdf');
    }

    public function procrument()
    {
        $data = Procrument::with('item')->get();
        return view('pages.laporan.penyediaanRekap', compact('data'));
    }

    public function procrumentPrint(Request $request)
    {
        $query = Procrument::query();

        if ($request->filled('from') && $request->filled('to')) {
            $from = Carbon::parse($request->from)->startOfDay(); // 00:00:00
            $to = Carbon::parse($request->to)->endOfDay();       // 23:59:59

            $query->whereBetween('tanggal_pengadaan', [$from, $to]);
            
        }

        $items = $query->get();

        $pdf = Pdf::loadView('pages.penyedia.print', compact('items'));

        return $pdf->stream('penyediaan-barang.pdf');
    }

    public function distribution(){
        $distributions = Distribution::with('item')->get();
        return view('pages.laporan.pengeluaranRekap',compact('distributions'));
    }

     public function distributionPrint(Request $request)
    {       
        $query = Distribution::query();
            
        if ($request->filled('from') && $request->filled('to')) {
    $query->whereDate('tanggal_pengeluaraan', '>=', $request->from)
          ->whereDate('tanggal_pengeluaraan', '<=', $request->to);
}
        
        $items = $query->get();
        $pdf = Pdf::loadView('pages.distribution.print', compact('items'));

        return $pdf->stream('pengeluaran-barang.pdf');
    }

    public function permintaan(){
        $requests = RequestModel::all();
        return view('pages.laporan.permintaanRekap',compact('requests'));
    }

    public function permintaanPrint(Request $request){
         $query = RequestModel::query();

        if ($request->filled('from') && $request->filled('to')) {
            $query->whereDate('tanggal_permintaan' , '>=' , $request->from)
                  ->whereDate('tanggal_permintaan','<=' , $request->to);
        }

        $items = $query->get();

        $pdf = Pdf::loadView('pages.Request.print', compact('items'));

        return $pdf->stream('pengeluaran-barang.pdf');
    }

    public function keuangan(){
        $financialReports = FinancialReport::all();
        return view('pages.laporan.financialRekap',compact('financialReports'));
    }

     public function keuanganPrint(Request $request){
         $query = FinancialReport::query();

        if ($request->filled('from') && $request->filled('to')) {
            $from = Carbon::parse($request->from)->startOfDay(); // 00:00:00
            $to = Carbon::parse($request->to)->endOfDay();       // 23:59:59

            $query->whereBetween('created_at', [$from, $to]);
        }

        $items = $query->get();

        $pdf = Pdf::loadView('pages.financialReport.print', compact('items'));

        return $pdf->stream('pengeluaran-barang.pdf');
    }
}
