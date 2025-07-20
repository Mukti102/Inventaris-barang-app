@extends('layouts.main')
@section('header-content')
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Distribution</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('distribution.index') }}">Data Distribution</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Distribution</li>
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
            <div class="card-title">Edit Data Distribution</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="needs-validation" action="{{ route('distribution.update', $distribution->id) }}" method="POST"
            novalidate>
            @csrf
            @method('PUT')
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row g-3">
                    <x-form.input label="Tanggal Pengeluaran" type="date" id="tanggal_pengeluaran" :value="old('tanggal_pengeluaran', $distribution->tanggal_pengeluaraan)" required />
                        
                    {{-- items option --}}
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Nama Barang</label>
                        <select class="form-select" id="validationCustom04" name="item_id" required>
                            <option selected disabled value="">--Barang--</option>
                            @foreach ($items as $item)
                                <option {{$item->id == $distribution->id ? "selected" : ""}} value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <x-form.input label="Jumlah" id="jumlah" :value="old('jumlah', $distribution->jumlah)" type="number" required />
                    <x-form.input label="Unit Penerima" type="text" id="unit_penerima" :value="old('unit_penerima', $distribution->unit_penerima)" required />
                    <x-form.input label="Petugas Penyerah" type="text" id="petugas_penyerah" :value="old('petugas_penyerah', $distribution->petugas_penyerah)" required />
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
