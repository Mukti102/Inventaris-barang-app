@extends('layouts.main')
@section('header-content')
    <x-alert />
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Informasi Laporang Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Informasi Laporan Barang</li>
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
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-0">Data Informasi Laporan Barang</h3>
                <a href="{{ route('laporan-barang.print') }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-print mr-1"></i> Print
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama Barang</th>
                        <th>Stock Awal</th>
                        <th>Jumlah Pemasukkan</th>
                        <th>Jumlah Pengeluaran</th>
                        <th>Sisa Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->item->nama_barang }}</td>
                            <td>{{ $item->stock_awal }}</td>
                            <td>
                                 <span class="badge bg-success">{{$item->jumlah_pemasukkan}}</span>
                            </td>
                            <td>
                                 <span class="badge bg-danger">{{$item->jumlah_pengeluaran}}</span>
                            </td>
                            <td>{{ $item->sisa_stok }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
