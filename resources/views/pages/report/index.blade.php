@extends('layouts.main')
@section('header-content')
    <div class="container-fluid">
        <h3>Rekapitulasi Bulanan Tahun {{ $tahun }}</h3>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-body p-2">
            <form method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <select name="bulan" class="form-control">
                            <option value="">-- Semua Bulan --</option>
                            @foreach (range(1, 12) as $b)
                                <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($b)->translatedFormat('F') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                         <select name="tahun" class="form-control">
                    @for ($y = date('Y'); $y >= 2020; $y--)
                        <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
                            {{ $y }}</option>
                    @endfor
                </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-filter"></i>
                            Tampilkan</button>

                        {{-- Tombol Print dengan query tahun --}}
                        <a href="{{ route('laporan-bulanan.print', ['tahun' => $tahun,'bulan' => $bulanFilter]) }}" target="_blank"
                            class="btn btn-info text-white">
                              <i class="fa-solid fa-print"></i>
                            Print</a>
                    </div>
                </div>
            </form>



            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jumlah Pengadaan</th>
                        <th>Jumlah Pengeluaran</th>
                        <th>Total Pengeluaran Keuangan</th>
                        <th>Sisa Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekapHarian as $data)
                        <tr>
                            <td>{{ $data['tanggal'] }}</td>
                            <td>{{ $data['jumlah_pengadaan'] }}</td>
                            <td>{{ $data['jumlah_pengeluaran'] }}</td>
                            <td>Rp{{ number_format($data['total_pengeluaran_keuangan'], 0, ',', '.') }}</td>
                            <td>{{ $data['sisa_stok'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
