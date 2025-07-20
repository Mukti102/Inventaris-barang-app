@extends('layouts.main')
@section('header-content')
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Laporan Permintaan Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Laporan Permintaan Barang</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
@endsection

@section('content')
    <!--begin::Form Validation-->
    <div class="card card-info card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Edit Data Laporan Permintaan Barang</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="needs-validation" action="{{ route('permintaan.update', $request->id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row g-3">
                    <x-form.input 
                        label="Nomor Permintaan" 
                        id="nomor_permintaan" 
                        type="number" 
                        :value="old('nomor_permintaan', $request->nomor_permintaan)" 
                        required 
                    />
                    <x-form.input 
                        label="Tanggal Permintaan" 
                        id="tanggal_permintaan" 
                        type="date" 
                        :value="old('tanggal_permintaan', $request->tanggal_permintaan)" 
                        required 
                    />
                    <x-form.input 
                        label="Nama Pemohon" 
                        id="nama_pemohon" 
                        :value="old('nama_pemohon', $request->nama_pemohon)" 
                        required 
                    />
                    <x-form.input 
                        label="Unit Kerja" 
                        id="unit_kerja" 
                        :value="old('unit_kerja', $request->unit_kerja)" 
                        required 
                    />
                    <x-form.input 
                        label="Status" 
                        id="status" 
                        :value="old('status', $request->status)" 
                        required 
                    />
                </div>
                <!--end::Row-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button class="btn btn-info" type="submit">Simpan Perubahan</button>
            </div>
            <!--end::Footer-->
        </form>
    </div>
@endsection
