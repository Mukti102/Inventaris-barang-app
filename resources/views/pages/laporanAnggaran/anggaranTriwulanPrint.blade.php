@extends('layouts.printPDF')
@section('title', 'Laporan Rincian Anggaran Per Triwulan Semester '. $id . " " . $periode ." ". date('Y')))
@section('content')

<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Kode Rekening</th>
            <th>DPA</th>
            <th>Kegiatan</th>
            @foreach ($months as $month)
                <th>{{ $month }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $i => $row)
        <tr>
            <td align="center">{{ $i + 1 }}</td>
            <td>{{ $row['kode_rekening'] }}</td>
            <td>Rp{{ number_format($row['dpa'], 0, ',', '.') }}</td>
            <td>{{ $row['kegiatan'] }}</td>
            @foreach ($months as $month)
                @php $key = strtolower($month); @endphp
                <td align="right">
                    {{ isset($row[$key]) ? 'Rp' . number_format($row[$key], 0, ',', '.') : '' }}
                </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
