@extends('layouts.printPDF')
@section('title', 'Laporan Anggaran Pertahun')

@section('content')

  
    <table style="width:100%; border-collapse: collapse; font-size: 12px;" border="1" cellspacing="0" cellpadding="6">
        <thead>
            <tr style="text-align:center; font-weight:bold; background:#f1f1f1;">
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Rekening</th>
                <th rowspan="2">DPA</th>
                <th rowspan="2">Kegiatan</th>
                <th rowspan="2">Pagu</th>
                <th colspan="2" rowspan="0">Semester I</th>
                <th colspan="2">Semester II</th>
                <th colspan="2">Realisasi</th>
            </tr>
            <tr style="text-align:center; font-weight:bold; background:#f9f9f9;">
                <th>Rp</th>
                <th>%</th>
                <th>Rp</th>
                <th>%</th>
                <th>Rp</th>
                <th>%</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $index => $row)
                <tr>
                    <td  style="text-align:center;">{{ $index + 1 }}</td>
                    <td>{{ $row['kode_rekening'] }}</td>
                    <td style="text-align:right;">Rp{{ number_format($row['dpa'], 0, ',', '.') }}</td>
                    <td>{{ $row['kegiatan'] }}</td>
                    <td style="text-align:right; font-weight:bold;">Rp{{ number_format($row['pagu'], 0, ',', '.') }}</td>

                    <td style="text-align:right;">Rp{{ number_format($row['semester1'], 0, ',', '.') }}</td>
                    <td style="text-align:center;">{{ $row['semester1_persen'] }}%</td>

                    <td style="text-align:right;">Rp{{ number_format($row['semester2'], 0, ',', '.') }}</td>
                    <td style="text-align:center;">{{ $row['semester2_persen'] }}%</td>

                    <td style="text-align:right;">Rp{{ number_format($row['realisasi'], 0, ',', '.') }}</td>
                    <td style="text-align:center;">{{ $row['realisasi_persen'] }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
