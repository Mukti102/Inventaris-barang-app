<?php
namespace App\Http\Controllers;

use App\Models\Distribution;
use App\Models\Item;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Kartu ringkasan
        $totalItems        = Item::count();
        $totalProcruments  = DB::table('procruments')->sum('jumlah_barang');
        $totalDistribution  = Distribution::count();
        $requestor    = ModelsRequest::count(); // contoh stat statis / dari GA

        // ======== DATA GRAFIK ========
        $year         = date('Y');
        $monthsLabel  = [];  // ['2025-01-01', ...]
        $pengadaanArr = [];  // total pengadaan tiap bulan
        $keluarArr    = [];  // total distribusi/pengeluaran tiap bulan

        for ($m = 1; $m <= 12; $m++) {
            $monthDate       = Carbon::create($year, $m, 1);
            $monthsLabel[]   = $monthDate->format('Y-m-d'); // YYYY-mm-01  → bagus untuk xaxis datetime

            $pengadaanArr[]  = DB::table('procruments')
                                ->whereYear('tanggal_pengadaan', $year)
                                ->whereMonth('tanggal_pengadaan', $m)
                                ->sum('jumlah_barang');

            $keluarArr[]     = DB::table('distributions')
                                ->whereYear('tanggal_pengeluaraan', $year)
                                ->whereMonth('tanggal_pengeluaraan', $m)
                                ->sum('jumlah');
        }

        return view('pages.dashboard', compact(
            'totalItems', 'totalDistribution', 'totalProcruments', 'requestor',
            'monthsLabel', 'pengadaanArr', 'keluarArr'
        ));
    }
}
