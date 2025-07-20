@extends('layouts.printPDF')
@section('title','Laporan Informasi Barang')
@section('content')

    <!-- Info Section -->
    <div class="info-section">
        <div class="info-left">
            <div class="info-item">
                <span class="info-label">Tanggal Cetak:</span>
                {{ date('d/m/Y H:i:s') }}
            </div>
            <div class="info-item">
                <span class="info-label">Dicetak oleh:</span>
                {{ Auth::user()->name ?? 'Admin' }}
            </div>
        </div>
        <div class="info-right">
            <div class="info-item">
                <span class="info-label">Total Barang:</span>
                {{ $items->count() }} Barang
            </div>
            <div class="info-item">
                <span class="info-label">Total Stock:</span>
                {{ $items->sum('sisa_stok') }} Barang
            </div>
        </div>
    </div>
    
    <!-- Summary -->
    <div class="summary">
        <div class="summary-item">Total Barang: {{ $items->count() }}</div>
        <div class="summary-item">Total Stok: {{ $items->sum('sisa_stok') }}</div>
    </div>
    
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 35%">Nama Barang</th>
                <th style="width: 10%">Stock Awal</th>
                <th style="width: 10%">Jumlah Pemasukkan</th>
                <th style="width: 10%">Jumlah Pengeluaran</th>
                <th style="width: 10%">Sisa Stock</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->item->nama_barang }}</td>
                    <td>{{ $item->stock_awal }}</td>
                    <td>{{ $item->jumlah_pemasukkan }}</td>
                    <td>{{ $item->jumlah_pengeluaran }}</td>
                    <td>{{ $item->sisa_stok }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data inventaris</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection