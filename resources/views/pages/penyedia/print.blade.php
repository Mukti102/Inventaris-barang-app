@extends('layouts.printPDF')
@section('title','Laporan Penyediaan Barang')
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
                <span class="info-label">Total Penyediaan:</span>
                {{ $items->count() }} penyediaan
            </div>
            <div class="info-item">
                <span class="info-label">Total Barang:</span>
                {{ $items->sum('jumlah_barang') }} Barang
            </div>
        </div>
    </div>
    
    <!-- Summary -->
    <div class="summary">
        <div class="summary-item">Total Penyedia: {{ $items->count() }}</div>
        <div class="summary-item">Total Barang: {{ $items->sum('jumlah_barang') }}</div>
    </div> --}}
    
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 15%">Nomor Pengadaan</th>
                <th style="width: 35%">Tanggal Pengadaan</th>
                <th style="width: 35%">Nama Suplier</th>
                <th style="width: 35%">Nama Barang</th>
                <th style="width: 35%">Jumlah Barang</th>
                <th style="width: 35%">Total Biaya</th>
                <th style="width: 35%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nomor_pengadaan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengadaan)->translatedFormat('d F Y')  }}</td>
                    <td>{{ $item->suplier_name }}</td>
                    <td>{{ $item->item->nama_barang }}</td>
                    <td class="text-center">{{ number_format($item->jumlah_barang) }}</td>
                    <td class="text-center">{{ number_format($item->total_biaya) }}</td>
                    <td>
                        @if ($item->status == "diterima")
                        <span class="badge bg-success" style="background: green;text-transform: capitalize">{{ $item->status }}</span>
                            @else
                        <span class="badge bg-danger" style="background: red;text-transform: capitalize">{{ $item->status }}</span>
                        @endif
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