@extends('layouts.main')
@section('header-content')
    <x-alert />
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Invetaris Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Invetaris Barang</li>
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
                <h3 class="card-title m-0">Data Inventaris Barang</h3>
                <div class="d-flex gap-2">
                    <a href="{{ route('invetarisBarang.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus mr-1"></i> Tambah
                    </a>
                    <a href="{{ route('invetarisBarang.print') }}" class="btn btn-sm btn-warning">
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategory</th>
                        <th>Stock</th>
                        <th>Lokasi Pnyimpanan</th>
                        <th style="width: 120px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            @if ($item->category)
                            <td>{{ $item->category->name }}</td>
                            @else
                            <td>Tidak ada</td>
                            @endif
                            <td>{{ $item->stok }}</td>
                            <td><span class="badge text-bg-danger">{{ $item->lokasi_penyimpanan }}</span></td>
                            <td class="px-2 py-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    {{-- Show --}}
                                    <a href="{{ route('invetarisBarang.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('invetarisBarang.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('invetarisBarang.destroy', $item->id) }}" method="POST"
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
