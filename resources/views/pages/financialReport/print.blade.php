@extends('layouts.printPDF')
@section('title', 'Laporan Informasi Pagu')
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
                <span class="info-label">Total Barang:</span>
                {{ $items->count() }} Barang
            </div>
            <div class="info-item">
                <span class="info-label">Total Stock:</span>
                {{ $items->sum('sisa_stok') }} Barang
            </div>
        </div>
    </div> --}}



    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 30%">Periode</th>
                <th style="width: 30%">Pagu Anggaran</th>
                <th style="width: 30%">Total Realisasi</th>
                <th style="width: 30%">Sisa Pagu</th>
                <th style="width: 30%">Persentase</th>
                <th style="width: 30%">Status</th>
            </tr>
        </thead>
        @php
            use Carbon\Carbon;
        @endphp
        <tbody>
            @forelse ($items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                    <td>{{ $item->periode }}</td>
                    <td>Rp {{ number_format($item->total_anggaran, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->total_realisasi, 0, ',', '.') }}</td>
                    <td>
                        Rp {{ number_format($item->selisih, 0, ',', '.') }}
                    </td>
                    @php
                        // persentase total_anggaran - relaisasi
                        $persentasePenggunaan =
                            $item->total_anggaran > 0 ? ($item->total_realisasi / $item->total_anggaran) * 100 : 0;
                    @endphp

                    <td>{{ $persentasePenggunaan }}%</td>

                    @php
                        // Hindari pembagian dengan nol
                        $persentasePenggunaan =
                            $item->total_anggaran > 0
                                ? ($item->total_realisasi / $item->total_anggaran) * 100
                                : 0;

                        // Tentukan status berdasarkan persentase
                        if ($persentasePenggunaan <= 50) {
                            $status = 'Aman';
                        } elseif ($persentasePenggunaan <= 80) {
                            $status = 'Peringatan';
                        } else {
                            $status = 'Bahaya';
                        }
                    @endphp

                    @if ($status == 'Aman')
                        <td>
                            <span style="background-color: green" class="badge ">{{ $status }}</span>
                        </td>
                    @elseif ($status == 'Peringatan')
                        <td>
                            <span style="background-color: yellow" class="badge">{{ $status }}</span>
                        </td>
                    @else
                        <td>
                            <span style="background-color: red" class="badge">{{ $status }}</span>
                        </td>
                    @endif


                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data inventaris</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Summary -->
    <div class="summary">
        <div class="summary-item">Total Pagu Anggaran : Rp {{ number_format($items->sum('total_anggaran'), 0, ',', '.') }}</div>
        <div class="summary-item">Total Realisasi: Rp {{ number_format($items->sum('total_realisasi'), 0, ',', '.') }}
        </div>
        <div class="summary-item">Sisa Pagu: Rp {{ number_format($items->sum('selisih'), 0, ',', '.') }}</div>
    </div>
@endsection
