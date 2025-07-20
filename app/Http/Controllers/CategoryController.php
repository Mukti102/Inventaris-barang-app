<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.categories.index',compact('categories'));
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
        $validated = $request->validate([
            'name' => 'required',
            'keterangan' => 'required'
        ]);

        try{
            Category::create($validated);
            Alert::success("Success","Berhasil Di Tambahkan");
            return back();
        }catch(Exception $e){
            Log::info("error Create category",['message' => $e->getMessage()]);
            Alert::error('Error',"Gagal Menambahkan");
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required',
            'keterangan' => 'required'
        ]);

        try{
            $category->update($validated);
            Alert::success("Success","Berhasil Di Update");
            return back();
        }catch(Exception $e){
            Log::info('Error',['message' => $e->getMessage()]);
            Alert::error("Error","Gagal Di Update");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
