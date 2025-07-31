@extends('layouts.main')

@section('header-content')
    <x-alert />

    <!-- Begin::Page Header -->
    <div class="container-fluid">
        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h3 class="mb-0">Rekap Laporan Pengeluaran Anggaran</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Rekap Laporan</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End::Page Header -->
@endsection

@section('content')
    <div class="card mb-4">
        <!-- Card Header -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Rekap Laporan Pengeluaran Anggaran</h3>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <x-laporan.card title="Laporan PerTahun" route="anggaran.peryear" cardColor="card-warning" />

                </div>
                <div class="col">
                    <x-laporan.card title="Laporan Anggaran Perkategory" route="anggaran.percategory.report"
                        cardColor="card-info" />

                </div>
                <div class="col">
                    <x-laporan.card title="Laporan Anggaran Bulanan" route="anggaran.permonth"
                        cardColor="card-success" />

                </div>
                <div class="col">
                    <x-laporan.card title="Laporan Anggaran Triwulan" route="anggaran.triwulan.index"
                        cardColor="card-danger" />

                </div>

            </div>
        </div>
    </div>
@endsection
