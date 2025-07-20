@extends('layouts.main')

@section('header-content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    @php
      $cards = [
        ['title' => 'Total Barang', 'value' => $totalItems, 'bg' => 'primary','route' => 'invetarisBarang.index'],
        ['title' => 'Total Pengadaan Barang', 'value' => $totalProcruments, 'bg' => 'success' ,'route' => 'penyediaan.index'],
        ['title' => 'Total Pengeluaran Barang', 'value' => $totalDistribution, 'bg' => 'warning','route' => 'distribution.index'],
        ['title' => 'Permintaan', 'value' => $requestor, 'bg' => 'danger','route' => 'permintaan.index'],
      ];
    @endphp

    @foreach ($cards as $card)
    <div class="col-lg-3 col-6">
      <div class="small-box text-bg-{{ $card['bg'] }}">
        <div class="inner">
          <h3>{{ $card['value'] }}</h3>
          <p>{{ $card['title'] }}</p>
        </div>
        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24">
          <path d="M3 3h18v18H3V3z" />
        </svg>
        <a href="{{route($card['route'])}}" class="small-box-footer text-light">More info <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    @endforeach
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">
          <h3 class="card-title">Grafik Pengadaan dan Pengeluaran</h3>
        </div>
        <div class="card-body">
          <div id="revenue-charts"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<!-- apexcharts -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
 
<script>
    /* Data dari PHP → JS */
    const monthsLabel   = @json($monthsLabel);   // ['2025-01-01', ...]
    const pengadaanData = @json($pengadaanArr);  // [28, 48, ...]
    const keluarData    = @json($keluarArr);     // [65, 59, ...]

    const sales_chart = new ApexCharts(document.querySelector('#revenue-charts'), {
        series: [
            { name: 'Pengadaan',  data: pengadaanData },
            { name: 'Pengeluaran', data: keluarData  },
        ],
        chart:   { height: 300, type: 'area', toolbar: { show: false } },
        colors:  ['#0d6efd', '#ffc107'],
        stroke:  { curve: 'smooth' },
        dataLabels: { enabled: false },
        xaxis: {
            type: 'datetime',
            categories: monthsLabel,   // pakai label dari controller
        },
        tooltip: {
            x: { format: 'MMMM yyyy' },
        },
        legend: { position: 'top' },
    });

    sales_chart.render();
</script>
@endpush
