@extends('layouts.main')
@section('header-content')
    <x-alert />
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Laporan Permintaan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Permintaan</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between">
            <div class="card-header justify-content-between">
                <div class="d-flex justify-content-between flex-wrap gap-2 w-100 align-items-center">
                    <h3 class="card-title m-0">Laporan Penyediaan Barang </h3>

                    <form action="{{ route('laporan.permintaan.print') }}" method="GET"
                        class="d-flex align-items-center gap-2">
                        <input type="date" name="from" class="form-control form-control-md"
                            value="{{ request('from') }}">
                        <span class="mx-1">s/d</span>
                        <input type="date" name="to" class="form-control form-control-md"
                            value="{{ request('to') }}">
                        <button type="submit" class="btn btn-md btn-primary">
                            Cetak
                        </button>
                    </form>

                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nomor Permintaan</th>
                        <th>Tanggal Permintaan</th>
                        <th>Nama Pemohon</th>
                        <th>Unit Kerja</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nomor_permintaan }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_permintaan)->translatedFormat('d F Y') }}</td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ $item->unit_kerja }}</td>
                            <td>{{ $item->status }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
