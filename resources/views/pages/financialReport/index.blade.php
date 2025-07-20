@extends('layouts.main')

@section('header-content')
    <x-alert />
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Laporan Keuangan Pagu</h3>
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
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-0">Data Laporan Keuangan</h3>
                <div class="d-flex gap-2">
                    {{-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambah">
                        <i class="fa fa-plus mr-1"></i> Tambah
                    </button> --}}
                    <a href="{{ route('financial-report.print') }}" class="btn btn-sm btn-warning">
                        <i class="fa-solid fa-print"></i> Print
                    </a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Periode</th>
                        <th>Bulan</th>
                        <th>Total Pagu</th>
                        <th>Total Realisasi</th>
                        <th>Sisa Pagu</th>
                        <th>Persentase</th>
                        <th>Status</th>
                        <th style="width: 120px;" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        use Carbon\Carbon;
                    @endphp
                    @foreach ($financialReports as $report)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if ($report->periode == 'tahunan')
                                    <span class="badge text-bg-info">
                                        {{ ucfirst($report->periode) }}
                                    </span>
                                @else
                                    <span class="badge text-bg-warning">
                                        {{ ucfirst($report->periode) }}
                                    </span>
                                @endif
                            </td>
                            <td>{{ $report->bulan_periode }}</td>
                            <td>Rp {{ number_format($report->total_anggaran, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($report->total_realisasi, 0, ',', '.') }}</td>
                            <td>
                                Rp {{ number_format($report->selisih, 0, ',', '.') }}
                            </td>

                            @php
                                // persentase total_anggaran - relaisasi
                                $persentasePenggunaan =
                                    $report->total_anggaran > 0
                                        ? ($report->total_realisasi / $report->total_anggaran) * 100
                                        : 0;
                            @endphp

                            <td>{{ $persentasePenggunaan }}%</td>

                            @php
                                // Hindari pembagian dengan nol
                                $persentasePenggunaan =
                                    $report->total_anggaran > 0
                                        ? ($report->total_realisasi / $report->total_anggaran) * 100
                                        : 0;

                                // Tentukan status berdasarkan persentase
                                if ($persentasePenggunaan <= 50) {
                                    $status = 'Aman';
                                } elseif ($persentasePenggunaan <= 80) {
                                    $status = 'Peringatan';
                                } else {
                                    $status = 'Bahaya';
                                }
                            @endphp

                            @if ($status == 'Aman')
                                <td>
                                    <span class="badge text-bg-success">{{ $status }}</span>
                                </td>
                            @elseif ($status == 'Peringatan')
                                <td>
                                    <span class="badge text-bg-warning">{{ $status }}</span>
                                </td>
                            @else
                                <td>
                                    <span class="badge text-bg-danger">{{ $status }}</span>
                                </td>
                            @endif

                            <td class="px-2 py-2">
                                <div class="d-flex gap-1 justify-content-center">

                                    {{-- Edit --}}
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $report->id }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>

                                    {{-- Delete --}}
                                    <form action="{{ route('financialreport.destroy', $report->id) }}" method="POST"
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

                    @if ($financialReports->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center text-muted">Belum ada data laporan keuangan.</td>
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
                                    <label for="bulan_periode" class="form-label">Bulan Periode</label>
                                    <input type="month" value="{{ $report->bulan_periode }}" class="form-control"
                                        id="bulan_periode" name="bulan_periode" required>
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
                            <label for="bulan_periode" class="form-label">Bulan Periode</label>
                            <input type="month" class="form-control" id="bulan_periode" name="bulan_periode" required>
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
