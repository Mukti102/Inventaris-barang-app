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
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-0">Data Laporan pengadaan barang baru</h3>
                <div class="d-flex gap-2">
                    <a href="{{ route('penyediaan.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus mr-1"></i> Tambah
                    </a>
                    <a href="{{ route('penyediaan.print') }}" class="btn btn-sm btn-warning">
                        <i class="fa-solid fa-print"></i> Print
                    </a>
                </div>
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
                        <th style="width: 120px;" class="text-center">Action</th>
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
                            <td class="px-2 py-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    {{-- Show --}}
                                    <a href="{{ route('penyediaan.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('penyediaan.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('penyediaan.destroy', $item->id) }}" method="POST"
                                        data-confirm-delete>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
