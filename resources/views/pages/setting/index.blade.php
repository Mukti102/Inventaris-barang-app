@extends('layouts.main')

@section('header-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Pengaturan Aplikasi</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
<x-alert/>
    <form action="{{ route('setting.store') }}" enctype="multipart/form-data" method="POST" class="card p-4">
        @csrf
        <h5 class="mb-4">Form Pengaturan</h5>

        <div class="row g-3">
            <x-form.input label="Nama Aplikasi" id="site_name" name="settings[site_name]" :value="old('settings.site_name', $settings['site_name'] ?? '')" required />

            <x-form.input label="Email" id="email" name="settings[email]" type="email"
                :value="old('settings.email', $settings['email'] ?? '')" />

             <x-form.input label="Alamat" id="address" name="settings[address]"
                :value="old('settings.phone', $settings['address'] ?? '')" />
             <x-form.input label="Nomor Telephone" id="phone" name="settings[phone]"
                :value="old('settings.phone', $settings['phone'] ?? '')" />
             <x-form.input label="Kepala" id="kepala" name="settings[kepala]"
                :value="old('settings.kepala', $settings['kepala'] ?? '')" />
             <x-form.input label="NIP Kepala" id="nip_kepala" name="settings[nip_kepala]"
                :value="old('settings.nip_kepala', $settings['nip_kepala'] ?? '')" />
             <x-form.input type="file" label="Logo" id="logo" name="logo"
                :value="old('settings.logo', $settings['logo'] ?? '')" />
            <x-form.input type="file" label="Favicon" id="favicon" name="favicon"
                :value="old('settings.favicon', $settings['favicon'] ?? '')" />
            
            {{-- Tambahkan field lainnya sesuai kebutuhan --}}  
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
        </div>
    </form>
@endsection
