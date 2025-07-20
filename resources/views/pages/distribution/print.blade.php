@extends('layouts.printPDF')
@section('title','Laporan Pengeluaran Barang')
@section('content')

    <!-- Info Section -->
    {{-- <div class="info-section">
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
                <span class="info-label">Total Pengeluaran:</span>
                {{ $items->count() }} Pengeluaran
            </div>
            <div class="info-item">
                <span class="info-label">Total Barang:</span>
                {{ $items->sum('jumlah') }} Barang
            </div>
        </div>
    </div>
    
    <!-- Summary -->
    <div class="summary">
        <div class="summary-item">Total Pengeluaran: {{ $items->count() }}</div>
        <div class="summary-item">Total Barang: {{ $items->sum('jumlah') }}</div>
    </div> --}}
    
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 35%">Tanggal Pengeluaran</th>
                <th style="width: 35%">Unit Penerima</th>
                <th style="width: 35%">Nama Barang</th>
                <th style="width: 35%">Jumlah Barang</th>
                <th style="width: 35%">Petugas Penyerah</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengeluaraan)->translatedFormat('d F Y')  }}</td>
                    <td>{{ $item->unit_penerima }}</td>
                    <td>{{ $item->item->nama_barang }}</td>
                    <td class="text-center">{{ number_format($item->jumlah) }}</td>
                    <td class="text-center">{{$item->petugas_penyerah}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data inventaris</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection