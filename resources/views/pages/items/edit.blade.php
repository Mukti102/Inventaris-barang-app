@extends('layouts.main')

@section('header-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Data Inventaris Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inventaris Barang</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-info card-outline mb-4">
        <div class="card-header">
            <div class="card-title">
                {{ isset($item) ? 'Edit Data Inventaris Barang' : 'Tambah Data Inventaris Barang' }}
            </div>
        </div>

        <form class="needs-validation"
            action="{{ isset($item) ? route('invetarisBarang.update', $item->id) : route('invetarisBarang.store') }}"
            method="POST" novalidate>
            @csrf
            @isset($item)
                @method('PUT')
            @endisset

            <div class="card-body">
                <div class="row g-3">

                    <x-form.input label="Nama Barang" id="nama_barang" :value="old('nama_barang', $item->nama_barang ?? '')" required />

                    <x-form.input label="Spesifikasi" id="spesifikasi" :value="old('spesifikasi', $item->spesifikasi ?? '')" required />

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Kategory</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Pilih Category --</option>
                            @foreach ($categories as $category)
                                <option {{$item->category_id == $category->id ? 'selected' : ''}} value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <x-form.input label="Satuan" id="satuan" :value="old('satuan', $item->satuan ?? '')" required />

                    <x-form.input label="Stok" id="stok" type="number" :value="old('stok', $item->stok ?? '')" required />

                    <x-form.input label="Lokasi Penyimpanan" id="lokasi_penyimpanan" :value="old('lokasi_penyimpanan', $item->lokasi_penyimpanan ?? '')" required />
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-info" type="submit">
                    {{ isset($item) ? 'Update Data' : 'Simpan Data' }}
                </button>
            </div>
        </form>
    </div>
@endsection
