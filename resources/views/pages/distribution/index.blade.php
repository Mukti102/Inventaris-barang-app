@extends('layouts.main')
@section('header-content')
    <x-alert />
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Pengeluaraan Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengeluaraan Barang</li>
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
                <h3 class="card-title m-0">Data Pengeluaraan Barang</h3>
                 <div class="d-flex gap-2">
                    <a href="{{ route('distribution.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus mr-1"></i> Tambah
                    </a>
                    <a href="{{ route('distribution.print') }}" class="btn btn-sm btn-warning">
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
                        <th>Tanggal Pengeluaraan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Unit Penerima</th>
                        <th>Petugas Penyerah</th>
                        <th style="width: 120px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distributions as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal_pengeluaraan)->translatedFormat('d F Y') }}</td>
                            <td>{{ $item->item->nama_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td><span class="badge text-bg-info">{{ $item->unit_penerima }}</span></td>
                            <td><span class="badge text-bg-warning">{{ $item->petugas_penyerah }}</span></td>
                            <td class="px-2 py-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    {{-- Show --}}
                                    <a href="{{ route('distribution.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('distribution.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('distribution.destroy', $item->id) }}" method="POST"
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
