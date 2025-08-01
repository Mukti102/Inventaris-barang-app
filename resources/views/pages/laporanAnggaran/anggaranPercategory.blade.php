@extends('layouts.printPDF')
@section('title', 'Laporan Realisasi Anggaran ' . $category->name)

@section('content')

    <table style="width:100%; border-collapse: collapse; font-size: 12px;" border="1" cellspacing="0" cellpadding="6">
        <thead>
            <tr style="text-align: center; font-weight: bold; background: #f1f1f1;">
                <td rowspan="2">No</td>
                <td rowspan="2">Kode Rekening</td>

                <td rowspan="2">Kegiatan</td>
                <td colspan="2">Pagu</td>
                <td colspan="2">Realisasi</td>
                <td colspan="2">Sisa</td>
            </tr>
            <tr style="text-align: center; font-weight: bold; background: #f9f9f9;">
                <td>Rp</td>
                <td>%</td>
                <td>Rp</td>
                <td>%</td>
                <td>Rp</td>
                <td>%</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $index => $row)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $row['no_rekening']->no_rekening ?? '-' }}</td>

                    <td>{{ $row['kegiatan']->item->nama_barang ?? '-' }}</td>
                    <td>Rp.{{ number_format($row['pagu']->nilai ?? 0, 0, ',', '.') }}</td>
                    <td style="text-align: center;">100%</td>
                    <td>Rp.{{ number_format($row['realisasi'] ?? 0, 0, ',', '.') }}</td>
                    <td style="text-align: center;">{{ $row['realisasiPercentage'] ?? 0 }}%</td>
                    <td>Rp.{{ number_format($row['sisa'] ?? 0, 0, ',', '.') }}</td>
                    <td style="text-align: center;">{{ $row['sisaPercentage'] ?? 0 }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
