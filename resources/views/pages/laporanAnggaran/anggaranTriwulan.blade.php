@extends('layouts.main')

@section('header-content')
    <x-alert />
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Laporan Anggaran Pertriwulan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Laporan Anggaran Pertriwulan</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title m-0">Data Laporan Anggaran Pertriwulan</h3>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                <i class="fa fa-plus mr-1"></i> Tambah
            </button>
        </div>
        <div class="card-body p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Semester</th>
                        <th>keterangan</th>
                        <th style="width: 120px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semesters as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>Semester {{ $item['semester'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('triwulan.print', $item['id']) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-print text-white"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
