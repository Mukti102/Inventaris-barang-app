@extends('layouts.main')
@section('header-content')
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Tambah Data Pagu</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Pagu</li>
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
            <div class="card-title">Tambah Data Pagu</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="needs-validation" action="{{ route('pagu-anggaran.store') }}" method="POST" novalidate>
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row g-3">
                    <x-form.input label="Tahun" type="number" placeholder="2025" id="tahun_anggaran" :value="old('tahun_anggaran')"
                        required />
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Kategory</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Pilih Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <x-form.input label="Nilai Pagu" type="number" id="nilai" :value="old('nilai')" required />
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
    </div>
@endsection
