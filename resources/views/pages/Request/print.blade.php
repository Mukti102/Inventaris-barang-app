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
                <span class="info-label">Total Permintaan:</span>
                {{ $items->count() }} Permintaan
            </div>
        </div>
    </div>
    
    <!-- Summary -->
    <div class="summary">
        <div class="summary-item">Total Permintaan: {{ $items->count() }}</div>
    </div> --}}
    
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 25%">Nomor Permintaan</th>
                <th style="width: 35%">Tanggal Permintaan</th>
                <th style="width: 30%">Nama Pemohon</th>
                <th style="width: 35%">Unit Kerja</th>
                <th style="width: 35%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nomor_permintaan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_permintaan)->translatedFormat('d F Y')  }}</td>
                    <td>{{ $item->nama_pemohon }}</td>
                    <td>{{ $item->unit_kerja }}</td>
                    <td>
                        <span class="badge bg-success" style="background: green;text-transform: capitalize">{{ $item->status }}</span>
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