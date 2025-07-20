@extends('layouts.main')
@section('header-content')
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Tambah Laporan Permintaan Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('permintaan.index') }}">Data Laporan Permintaan </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Laporan Permintaan Barang</li>
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
            <div class="card-title">Tambah Data Laporan Permintaan Barang</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="needs-validation" action="{{route('permintaan.store')}}" method="POST" novalidate>
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row g-3">
                    <x-form.input label="Nomor Permintaan" id="nomor_permintaan" type="number" :value="old('nomor_permintaan')" required />
                    <x-form.input label="Tanggal Permintaan" id="tanggal_permintaan" :value="old('tanggal_permintaan')" type="date" required />
                    <x-form.input label="Nama Pemohon" id="nama_pemohon" :value="old('nama_pemohon')" required />
                    <x-form.input label="Unit Kerja" id="unit_kerja" :value="old('unit_kerja')"  required />
                    <x-form.input label="Status" id="status" :value="old('status')" required />
                </div>
                <!--end::Row-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button class="btn btn-info" type="submit">Submit form</button>
            </div>
            <!--end::Footer-->
        </form>
@endsection
