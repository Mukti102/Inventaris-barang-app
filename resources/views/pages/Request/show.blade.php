@extends('layouts.main')

@section('header-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Detail Laporan Permintaan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('penyediaan.index') }}">Laporan Permintaan Barang</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
<x-alert/>
    <div class="card card-info card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Detail Laporan Permintaan {{ $request->nama_pemohon }}</div>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Nomor Permintaan :</dt>
                <dd class="col-sm-8">{{ $request->nomor_permintaan }}</dd>

                <dt class="col-sm-4">Tanggal Permintaan :</dt>
                <dd class="col-sm-8">{{ \Carbon\Carbon::parse($request->tanggal_permintaan)->translatedFormat('d F Y') }}
                </dd>

                <dt class="col-sm-4">Nama Pemohon :</dt>
                <dd class="col-sm-8">{{ $request->nama_pemohon }}</dd>

                <dt class="col-sm-4">Unit Kerja :</dt>
                <dd class="col-sm-8">{{ $request->unit_kerja }}</dd>

                <dt class="col-sm-4">Status :</dt>
                <dd class="col-sm-8">{{ $request->status }}</dd>
            </dl>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header justify-content-between">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-0">Data Laporan Permintaan</h3>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="fa fa-plus mr-1"></i> Tambah
                </button>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th style="width: 120px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestsDetails as $item)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->item->nama_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->status }}
                            </td>
                            <td class="px-2 py-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>

                                    {{-- Delete --}}
                                    <form action="{{ route('requestDetail.destroy', $item->id) }}" method="POST"
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
            @foreach ($requestsDetails as $item)
                <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1"
                    aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog bg-white">
                        <form action="{{ route('requestDetail.update', $item->id) }}" method="POST" class="modal-content">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditLabel{{ $item->id }}">Edit Detail Permintaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="request_id" value="{{ $request->id }}">
                                <div class="mb-3">
                                    <label for="item_id" class="form-label">Nama Barang</label>
                                    <select name="item_id" class="form-select" required>
                                        @foreach ($items as $barang)
                                            <option value="{{ $barang->id }}"
                                                {{ $barang->id == $item->item_id ? 'selected' : '' }}>
                                                {{ $barang->nama_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" value="{{ $item->jumlah }}"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- /.card-body -->
        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('requestDetail.store') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Detail Permintaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="request_id" value="{{ $request->id }}">

                        <div class="mb-3">
                            <label for="item_id" class="form-label">Nama Barang</label>
                            <select name="item_id" id="item_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Barang --</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
