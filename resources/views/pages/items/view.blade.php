@extends('layouts.main')

@section('header-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Detail Data Inventaris Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('invetarisBarang.index') }}">Inventaris Barang</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-info card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Detail Barang: {{ $item->nama_barang }}</div>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Kode Barang</dt>
                <dd class="col-sm-8">{{ $item->kode_barang }}</dd>

                <dt class="col-sm-4">Nama Barang</dt>
                <dd class="col-sm-8">{{ $item->nama_barang }}</dd>

                <dt class="col-sm-4">Spesifikasi</dt>
                <dd class="col-sm-8">{{ $item->spesifikasi }}</dd>

                <dt class="col-sm-4">Kategori</dt>
                <dd class="col-sm-8">{{ $item->kategori }}</dd>

                <dt class="col-sm-4">Satuan</dt>
                <dd class="col-sm-8">{{ $item->satuan }}</dd>

                <dt class="col-sm-4">Stok</dt>
                <dd class="col-sm-8">{{ $item->stok }}</dd>

                <dt class="col-sm-4">Lokasi Penyimpanan</dt>
                <dd class="col-sm-8">
                    <span class="badge bg-danger">{{ $item->lokasi_penyimpanan }}</span>
                </dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('invetarisBarang.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('invetarisBarang.edit', $item->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
@endsection
