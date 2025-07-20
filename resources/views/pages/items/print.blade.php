@extends('layouts.printPDF')
@section('title','Laporan Inventaris Barang')
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
                <span class="info-label">Total Item:</span>
                {{ $items->count() }} barang
            </div>
            <div class="info-item">
                <span class="info-label">Total Stok:</span>
                {{ $items->sum('stok') }} unit
            </div>
        </div>
    </div>
    
    <!-- Summary -->
    <div class="summary">
        <div class="summary-item">Total Barang: {{ $items->count() }}</div>
        <div class="summary-item">Total Stok: {{ $items->sum('stok') }}</div>
        <div class="summary-item">Lokasi Tersedia: {{ $items->pluck('lokasi_penyimpanan')->unique()->count() }}</div>
    </div> --}}
    
    <!-- Table -->
    <table class="table" style="margin-top: 40px">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 15%">Kode Barang</th>
                <th style="width: 35%">Nama Barang</th>
                <th style="width: 10%">Stok</th>
                <th style="width: 35%">Lokasi Penyimpanan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td class="text-center">{{ number_format($item->stok) }}</td>
                    <td>
                        <span class="badge">{{ $item->lokasi_penyimpanan }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data inventaris</td>
                </tr>
            @endforelse
        </tbody>
    </table>


@endsection