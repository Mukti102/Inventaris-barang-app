@extends('layouts.main')

@section('header-content')
    <x-alert />

    <!-- Begin::Page Header -->
    <div class="container-fluid">
        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h3 class="mb-0">Rekap Laporan</h3>
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
            <h3 class="card-title m-0">Rekap Laporan Data</h3>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <x-laporan.card 
                        title="Inventaris Barang" 
                        route="laporan.item" 
                        cardColor="card-warning" 
                    />
                </div>
                <div class="col">
                    <x-laporan.card 
                        title="Pagu Anggaran" 
                        route="laporan.pagu" 
                        cardColor="card-danger" 
                    />
                </div>
                <div class="col">
                    <x-laporan.card 
                        title="Penyediaan Barang" 
                        route="laporan.procrument" 
                        cardColor="card-success" 
                    />
                </div>
                <div class="col">
                    <x-laporan.card 
                        title="Pengeluaran Barang" 
                        route="laporan.distribution" 
                        cardColor="card-danger" 
                    />
                </div>
                <div class="col">
                    <x-laporan.card 
                        title="Permintaan Barang" 
                        route="laporan.permintaan" 
                        cardColor="card-info" 
                    />
                </div>
                <div class="col">
                    <x-laporan.card 
                        title="Laporan Keuangan" 
                        route="laporan.keuangan" 
                        cardColor="card-primary" 
                    />
                </div>
                <div class="col">
                    <x-laporan.card 
                        title="Laporan Keuanagan Pagu" 
                        route="financialreport.index" 
                        cardColor="card-success" 
                    />
                </div>
            </div>
        </div>
    </div>
@endsection
