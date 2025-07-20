@extends('layouts.printPDF')
@section('title','Laporan Bulanan')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah Pengadaan</th>
                <th>Jumlah Pengeluaran</th>
                <th>Total Pengeluaran Keuangan</th>
                <th>Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekapHarian as $data)
                <tr>
                    <td>{{ $data['tanggal'] }}</td>
                    <td>{{ $data['jumlah_pengadaan'] }}</td>
                    <td>{{ $data['jumlah_pengeluaran'] }}</td>
                    <td>Rp{{ number_format($data['total_pengeluaran_keuangan'], 0, ',', '.') }}</td>
                    <td>{{ $data['sisa_stok'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection