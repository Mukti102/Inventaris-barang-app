@extends('layouts.printPDF')
@section('title','Laporan Pagu Anggaran')
@section('content')
    <!-- Table -->
    <table class="table" style="margin-top: 40px">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 20%">Kategory</th>
                <th style="width: 20%">Total Anggaran</th>
                <th style="width: 35%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <span class="badge bg-text-success">{{ $item->nilai }}</span>
                    </td>
                    <td>{{ $item->category->keterangan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data Pagu Anggaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>


@endsection