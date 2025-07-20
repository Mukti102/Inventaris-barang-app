@extends('layouts.main')
@section('header-content')
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Tambah Laporan pengadaan barang baru</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Laporan pengadaan barang baru</li>
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
            <div class="card-title">Tambah Data Laporan pengadaan barang baru</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="needs-validation" action="{{route('penyediaan.store')}}" method="POST" novalidate>
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row g-3">
                    <x-form.input label="Nomor Pengadaan" id="nomor_pengadaan" :value="old('nomor_pengadaan')" required />
                    <x-form.input label="Tanggal Pengadaan" id="tanggal_pengadaan" :value="old('tanggal_pengadaan')" type="date" required />
                    <x-form.input label="Nama Supplier" id="suplier_name" :value="old('suplier_name')" required />
                    {{-- items option --}}
                     <div class="col-md-6">
                          <label for="validationCustom04" class="form-label">Nama Barang</label>
                          <select class="form-select" id="validationCustom04" name="item_id" required>
                              <option selected disabled value="">--Barang--</option>    
                            @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                            @endforeach                            
                          </select>
                          <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <x-form.input label="Jumlah Barang" id="jumlah_barang" :value="old('jumlah_barang')" type="number" required />
                    <x-form.input label="Total Biaya" type="number" id="total_biaya" :value="old('total_biaya')" required />
                     {{-- items option --}}
                     <div class="col-md-6">
                          <label for="validationCustom04" class="form-label">Status</label>
                          <select class="form-select" name="status" id="validationCustom04" required>
                            <option selected disabled value="">--Status--</option>
                            <option value="diterima">Di Terima</option>
                            <option value="belum diterima">Belum DiTerima</option>
                          </select>
                          <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
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
