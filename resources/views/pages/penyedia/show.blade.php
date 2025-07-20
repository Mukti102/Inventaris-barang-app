@extends('layouts.main')

@section('header-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Detail Data Penyediaan Baru</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('penyediaan.index') }}">Laporan pengadaan barang baru</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-info card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Detail Pengadaan: {{ $procrument->item->nama_barang }}</div>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Nomor Pengadaan</dt>
                <dd class="col-sm-8">{{ $procrument->nomor_pengadaan }}</dd>

                <dt class="col-sm-4">Tanggal Pengadaan</dt>
                <dd class="col-sm-8">{{ \Carbon\Carbon::parse($procrument->tanggal_pengadaan)->translatedFormat('d F Y') }}</dd>

                <dt class="col-sm-4">Suplier</dt>
                <dd class="col-sm-8">{{ $procrument->suplier_name }}</dd>

                <dt class="col-sm-4">Nama Barang</dt>
                <dd class="col-sm-8">{{ $procrument->item->nama_barang }}</dd>

                <dt class="col-sm-4">Jumlah Barang</dt>
                <dd class="col-sm-8">{{ $procrument->jumlah_barang }}</dd>

                <dt class="col-sm-4">Total Biaya</dt>
                <dd class="col-sm-8">Rp{{ number_format($procrument->total_biaya, 0, ',', '.') }}</dd>

                <dt class="col-sm-4">Status</dt>
                <dd class="col-sm-8">
                    <span class="badge {{ $procrument->status == 'diterima' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst($procrument->status) }}
                    </span>
                </dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('penyediaan.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('penyediaan.edit', $procrument->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
@endsection
