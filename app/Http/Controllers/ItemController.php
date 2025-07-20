<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\ReportItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('category')->get();
        return view('pages.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();
        return view('pages.items.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required',
            'spesifikasi' => 'required',
            'stok' => 'required|numeric|min:1',
            'satuan' => 'required',
            'category_id' => 'required',
            'lokasi_penyimpanan' => 'required',
        ]);


        try {
            // Generate kode barang otomatis (misal format: BRG0001)
            $latest = DB::table('items')->latest('id')->first();
            $number = $latest ? ((int)substr($latest->kode_barang, 3)) + 1 : 1;
            $kode_barang = 'BRG' . str_pad($number, 4, '0', STR_PAD_LEFT);

            DB::transaction(function() use ($request,$kode_barang){
                // Simpan ke database
                $item = Item::create([
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $request->nama_barang,
                    'spesifikasi' => $request->spesifikasi,
                    'kategori' => '0',
                    'category_id' => $request->category_id,
                    'stok' => $request->stok,
                    'satuan' => $request->satuan,
                    'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
                ]);
    
    
                // report item
                ReportItem::create([
                    "item_id" =>  $item->id,
                    "stock_awal" => $item->stok,
                    "jumlah_pemasukkan" => "0",
                    "jumlah_pengeluaran" => "0",
                    "sisa_stok" => $item->stok,
                ]);
            });
            return redirect()->route('invetarisBarang.index')->with('success', 'Data barang berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return back()->withErrors('Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    public function print()
    {
        $items = Item::orderBy('nama_barang', 'asc')->get();

        // Load view dan convert ke PDF
        $pdf = Pdf::loadView('pages.items.print', compact('items'));

        return $pdf->stream('inentaris-barang' . '.pdf');


        // // Set paper size dan orientation
        // $pdf->setPaper('A4', 'portrait');

        // // Set options untuk PDF
        // $pdf->setOptions([
        //     'isHtml5ParserEnabled' => true,
        //     'isPhpEnabled' => true,
        //     'defaultFont' => 'Arial'
        // ]);

        // // Generate filename dengan timestamp
        // $filename = 'Laporan_Inventaris_' . date('Y-m-d_H-i-s') . '.pdf';

        // // Download PDF
        // return $pdf->download($filename);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item, $id)
    {
        $item = Item::find($id);
        return view('pages.items.view', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item,  $id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('pages.items.edit', compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item, $id)
    {
        $item = Item::find($id);
        $request->validate([
            'nama_barang' => 'required',
            'spesifikasi' => 'required',
            'stok' => 'required|numeric|min:1',
            'satuan' => 'required',
            'category_id',
            'lokasi_penyimpanan' => 'required',
        ]);

        try {
            $item->update([
                'nama_barang' => $request->nama_barang,
                'spesifikasi' => $request->spesifikasi,
                'kategori' => '0',
                'category_id' => $request->category_id,
                'stok' => $request->stok,
                'satuan' => $request->satuan,
                'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
            ]);
            return redirect()->route('invetarisBarang.index')->with('success', 'Data barang berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item, $id)
    {
        try {
            Item::destroy($id);
            return redirect()->route('invetarisBarang.index')->with('success', "Berhasil Di Hapus");
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }
}
