@extends('layouts.main')

@section('header-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Profil Pengguna</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row g-4">

        {{-- Update Profile --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Informasi Profil</h5>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')
                        <div class="row g-3">
                            <x-form.input label="Nama" id="name" name="name" :value="old('name', auth()->user()->name)" required />

                            <x-form.input label="Email" id="email" name="email" type="email" :value="old('email', auth()->user()->email)"
                                required />

                            <x-form.input label="Photo Profile" id="avatar"
                                name="avatar" type="file" required />
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                @if (session('status') === 'profile-updated')
                                    <span class="text-success ms-3">Profil berhasil diperbarui.</span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Update Password --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Password</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <x-form.input label="Password Lama" id="current_password" name="current_password"
                                type="password" required />
                            <x-form.input label="Password Baru" id="password" name="password" type="password" required />
                            <x-form.input label="Konfirmasi Password Baru" id="password_confirmation"
                                name="password_confirmation" type="password" required />

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Perbarui Password</button>
                                @if (session('status') === 'password-updated')
                                    <span class="text-success ms-3">Password berhasil diperbarui.</span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
