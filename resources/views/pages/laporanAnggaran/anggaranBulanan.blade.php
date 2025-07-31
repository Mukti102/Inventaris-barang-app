@extends('layouts.printPDF')
@section('title', 'Laporan Anggaran Bulanan')

@section('content')

   <table style="width:100%; border-collapse: collapse; font-size: 12px;" border="1" cellspacing="0" cellpadding="6">
    <thead>
        <tr style="text-align: center; font-weight: bold; background: #f1f1f1;">
            <td>No</td>
            <td>Kode Rekening</td>
            <td>DPA</td>
            <td>Kegiatan</td>
            <td>Januari</td>
            <td>Februari</td>
            <td>Maret</td>
            <td>April</td>
            <td>Mei</td>
            <td>Juni</td>
            <td>Juli</td>
            <td>Agustus</td>
            <td>September</td>
            <td>Oktober</td>
            <td>November</td>
            <td>Desember</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $index => $row)
            <tr>
                <td style="text-align:center;">{{ $index + 1 }}</td>
                <td>{{ $row['kode_rekening'] }}</td>
                <td>Rp.{{ number_format($row['dpa'], 0, ',', '.') }}</td>
                <td>{{ $row['kegiatan'] }}</td>
                @foreach ($row['bulan'] as $value)
                    <td style="text-align:right;">{{ $value ? number_format($value, 0, ',', '.') : '' }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
