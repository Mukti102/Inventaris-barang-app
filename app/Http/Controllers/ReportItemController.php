<?php

namespace App\Http\Controllers;

use App\Models\ReportItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = ReportItem::with('item')->get();
        return view('pages.reportItem.index',compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReportItem $reportItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportItem $reportItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportItem $reportItem)
    {
        //
    }

    public function print(){
        
        $items = ReportItem::with('item')->orderBy('item_id', 'asc')->get();

        // Load view dan convert ke PDF
        $pdf = Pdf::loadView('pages.reportItem.print', compact('items'));

        return $pdf->stream('laporan-barang' .'.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportItem $reportItem)
    {
        //
    }
}
