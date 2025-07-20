@extends('layouts.main')
@section('header-content')
    <x-alert />
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Laporan Invetaris Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Invetaris Barang</li>
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
                <h3 class="card-title m-0">Laporan Inventaris Barang</h3>

                <form action="{{ route('laporan.item.print') }}" method="GET" class="d-flex align-items-center gap-2">
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
                         <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stock</th>
                        <th>Lokasi Pnyimpanan</th>
                        <th style="width: 120px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @php
    use Carbon\Carbon;
@endphp

                    @foreach ($items as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                             <td>{{Carbon::parse($item->created_at)->translatedFormat('d F Y')}}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>
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
