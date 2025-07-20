<?php

namespace App\Http\Controllers;

use App\Models\RequestDetail;
use Exception;
use Illuminate\Http\Request;

class RequestDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            "item_id" => "required",
            "request_id" => "required",
            "jumlah" => "required"
        ]);

        try{
            RequestDetail::create($request->all());
            return back()->with('success','Berhasil Di Tambah');
        }catch(Exception $e){
            return back()->withErrors('Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestDetail $requestDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestDetail $requestDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestDetail $requestDetail)
    {
        $request->validate([
            "item_id" => "required",
            "request_id" => "required",
            "jumlah" => "required"
        ]);

        try{
            $requestDetail->update($request->all());
            return back()->with('success','Berhasil Di Perbarui');
        }catch(Exception $e){
            return back()->withErrors('Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestDetail $requestDetail)
    {
        try{
            $requestDetail->delete();
            return back()->with('success',"Berhasil Di Hapus");
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
