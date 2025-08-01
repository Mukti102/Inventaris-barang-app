@extends('layouts.main')

@section('header-content')
    <x-alert />
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Kategori Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Kategori Barang</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title m-0">Data Kategori Barang</h3>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                <i class="fa fa-plus mr-1"></i> Tambah
            </button>
        </div>
        <div class="card-body p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>No Rekening</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th style="width: 120px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_rekening ?? '-' }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('category.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal-{{ $item->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                        data-confirm-delete>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($categories->count() !== 0)
                {{-- Modal Edit --}}
                <div class="modal fade " id="editCategoryModal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog ">
                        <form action="{{ route('category.update', $item->id) }}" method="POST" class="modal-content">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>No Rekening</label>
                                    <input type="text" name="no_rekening" class="form-control" value="{{ $item->no_rekening }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label>No Rekening</label>
                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control">{{ $item->keterangan }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Modal Create --}}
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('category.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>No Rekening</label>
                        <input type="text" name="no_rekening" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
