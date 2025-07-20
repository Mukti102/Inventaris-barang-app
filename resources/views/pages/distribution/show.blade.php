@extends('layouts.main')

@section('header-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Detail Distribusi Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('distribution.index') }}">Distribusi Barang</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-info card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Detail Distribusi: {{ $distribution->item->nama_barang }}</div>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Tanggal Pengeluaran</dt>
                <dd class="col-sm-8">{{ \Carbon\Carbon::parse($distribution->tanggal_pengeluaraan)->translatedFormat('d F Y') }}
                </dd>

                <dt class="col-sm-4">Nama Barang</dt>
                <dd class="col-sm-8">{{ $distribution->item->nama_barang }}</dd>

                <dt class="col-sm-4">Jumlah</dt>
                <dd class="col-sm-8">{{ $distribution->jumlah }}</dd>

                <dt class="col-sm-4">Unit Penerima</dt>
                <dd class="col-sm-8">{{ $distribution->unit_penerima }}</dd>

                <dt class="col-sm-4">Petugas Penyerah</dt>
                <dd class="col-sm-8">{{ $distribution->petugas_penyerah }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('distribution.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('distribution.edit', $distribution->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
@endsection
