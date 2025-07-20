<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Request as RequestModel;
use App\Models\RequestDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = RequestModel::all();
        return view('pages.Request.index', compact('requests'));
    }

    public function create()
    {
        return view('pages.Request.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_permintaan'   => 'required',
            'tanggal_permintaan' => 'required',
            'nama_pemohon'       => 'required',
            'unit_kerja'         => 'required',
            'status'             => 'required',
        ]);

        try {
            RequestModel::create($request->all());
            return redirect()->route('permintaan.index')->with('success', 'Berhasil ditambahkan');
        } catch (Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menambahkan data: ' . $e->getMessage());
        }
    }

    public function show(RequestModel $request,$id)
    {   
        $request = RequestModel::find($id);
        $items = Item::all();
        $requestsDetails = RequestDetail::where('request_id',$request->id)->get();
        return view('pages.Request.show', compact('request','requestsDetails','items'));
    }

    public function edit(RequestModel $request,$id)
    {   
        $request = RequestModel::find($id);
        return view('pages.Request.edit', compact('request'));
    }

     public function print()
    {
        $items = RequestModel::orderBy('nomor_permintaan', 'asc')->get();

        // Load view dan convert ke PDF
        $pdf = Pdf::loadView('pages.Request.print', compact('items'));

        return $pdf->stream('permintaan' . '.pdf');

    }

    public function update(Request $request, RequestModel $modelRequest,$id)
    {   
        $modelRequest = RequestModel::find($id);
        $request->validate([
            'nomor_permintaan'   => 'required',
            'tanggal_permintaan' => 'required',
            'nama_pemohon'       => 'required',
            'unit_kerja'         => 'required',
            'status'             => 'required',
        ]);

        try {
            $modelRequest->update($request->all());
            return redirect()->route('permintaan.index')->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(RequestModel $request,$id)
    {   
        $request = RequestModel::find($id);
        try {
            $request->delete();
            return redirect()->route('permintaan.index')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
