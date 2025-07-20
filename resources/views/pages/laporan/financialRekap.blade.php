@extends('layouts.main')

@section('header-content')
    <x-alert />
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Laporan Keuangan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Keuangan</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between">
            <div class="d-flex justify-content-between flex-wrap gap-2 w-100 align-items-center">
                <h3 class="card-title m-0">Laporan Keuangan</h3>

                <form action="{{ route('laporan.keuangan.print') }}" method="GET" class="d-flex align-items-center gap-2">
                    <input type="date" name="from" class="form-control form-control-md" value="{{ request('from') }}">
                    <span class="mx-1">s/d</span>
                    <input type="date" name="to" class="form-control form-control-md" value="{{ request('to') }}">
                    <button type="submit" class="btn btn-md btn-primary">
                       Cetak
                    </button>
                </form>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tanggal</th>
                        <th>Periode</th>
                        <th>Total Anggaran</th>
                        <th>Total Realisasi</th>
                        <th>Selisih</th>
                        <th>Rincian Transaksi</th>
                    </tr>
                </thead>
                @php
                    use Carbon\Carbon;
                @endphp
                <tbody>
                    @foreach ($financialReports as $report)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{Carbon::parse($report->created_at)->translatedFormat('d F Y')}}</td>
                            <td>
                                @if ($report == 'tahunan')
                                    <span class="badge text-bg-secondary">
                                        {{ ucfirst($report->periode) }}
                                    </span>
                                @else
                                    <span class="badge text-bg-info">
                                        {{ ucfirst($report->periode) }}
                                    </span>
                                @endif
                            </td>
                            <td>Rp {{ number_format($report->total_anggaran, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($report->total_realisasi, 0, ',', '.') }}</td>
                            <td>
                                Rp {{ number_format($report->selisih, 0, ',', '.') }}
                            </td>

                            <td>{{ $report->rincian_transaksi }}</td>
                        </tr>
                    @endforeach

                    @if ($financialReports->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data laporan keuangan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{-- modla edit --}}
            @foreach ($financialReports as $report)
                <div class="modal fade" id="modalEdit{{ $report->id }}" tabindex="-1"
                    aria-labelledby="modalEditLabel{{ $report->id }}" aria-hidden="true">
                    <div class="modal-dialog bg-white">
                        <form action="{{ route('financialreport.update', $report->id) }}" method="POST"
                            class="modal-content">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditLabel{{ $report->id }}">Edit Detail Permintaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="periode" class="form-label">Periode</label>
                                    <select name="periode" class="form-select" required>
                                        <option value="" disabled> Periode
                                        </option>
                                        <option value="tahunan" {{ $report->periode == 'tahunan' ? 'selcted' : '' }}>
                                            Tahunan
                                        </option>
                                        <option value="bulanan" {{ $report->periode == 'bulanan' ? 'selected' : '' }}>
                                            Bulanan
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="total_anggaran" class="form-label">Total Anggaran</label>
                                    <input type="number" class="form-control" name="total_anggaran"
                                        value="{{ $report->total_anggaran }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="total_realisasi" class="form-label">Total Realisasi</label>
                                    <input type="number" class="form-control" name="total_realisasi"
                                        value="{{ $report->total_realisasi }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rincian_transaksi" class="form-label">Rincian Transaksi</label>
                                    <input type="text" class="form-control" name="rincian_transaksi"
                                        value="{{ $report->rincian_transaksi }}" required>
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
        {{-- Modal tambah --}}
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('financialreport.store') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Laporan Keuangan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="periode" class="form-label">Periode</label>
                            <select name="periode" class="form-select" required>
                                <option value="" disabled selected>Periode</option>
                                <option value="tahunan">Tahunan</option>
                                <option value="bulanan">Bulanan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="total_anggaran" class="form-label">Total Anggaran</label>
                            <input type="number" class="form-control" id="total_anggaran" name="total_anggaran"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="total_realisasi" class="form-label">Total Realisasi</label>
                            <input type="number" class="form-control" id="total_realisasi" name="total_realisasi"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="rincian_transaksi" class="form-label">Rincian Transaksi</label>
                            <input type="text" class="form-control" id="rincian_transaksi" name="rincian_transaksi"
                                required>
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
