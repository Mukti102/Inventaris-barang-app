@extends('layouts.main')
@section('header-content')
    <x-alert />
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Laporan pengadaan barang baru</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan pengadaan barang baru</li>
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
            <div class="d-flex justify-content-between flex-wrap gap-2 w-100 align-items-center">
                <h3 class="card-title m-0">Laporan Penyediaan Barang </h3>

                <form action="{{ route('laporan.procrument.print') }}" method="GET" class="d-flex align-items-center gap-2">
                    <input type="date" name="from" class="form-control form-control-md" value="{{ request('from') }}">
                    <span class="mx-1">s/d</span>
                    <input type="date" name="to" class="form-control form-control-md" value="{{ request('to') }}">
                    <button type="submit" class="btn btn-md btn-primary">
                       Cetak
                    </button>
                </form>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nomor Pengadaan</th>
                        <th>Tanggal Pengadaan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Supplier</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nomor_pengadaan }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pengadaan)->translatedFormat('d F Y')  }}</td>
                            <td>{{ $item->item->nama_barang }}</td>
                            <td>{{ $item->jumlah_barang }}</td>
                            <td>{{ $item->suplier_name }}</td>
                            <td>{{ $item->total_biaya }}</td>
                            <td>
                                @if ($item->status == 'diterima')
                                    <span class="badge bg-success">Diterima</span>
                                @else
                                    <span class="badge bg-danger">Belum Di Terima</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
