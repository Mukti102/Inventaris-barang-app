<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonthlySummariesController;
use App\Http\Controllers\PaguAnggaranController;
use App\Http\Controllers\ProcrumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\ReportItemController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestDetailController;
use App\Http\Controllers\SettingController;
use App\Models\FinancialReport;
use App\Models\Procrument;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/contact', [GuestController::class, 'contact'])->name('kontak');
Route::get('/tentang', [GuestController::class, 'about'])->name('tentang');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category',CategoryController::class);
    Route::resource('invetarisBarang', ItemController::class);
    Route::get('/invetarisBarang-print', [ItemController::class, 'print'])->name('invetarisBarang.print');
    Route::resource('penyediaan', ProcrumentController::class);
    Route::get('/penyediaan-print', [ProcrumentController::class, 'print'])->name('penyediaan.print');
    Route::resource('distribution', DistributionController::class);
    Route::get('/pengeluaran-print', [DistributionController::class, 'print'])->name('distribution.print');
    Route::resource('laporan-barang', ReportItemController::class);
    Route::get('/laporan-barang-print', [ReportItemController::class, 'print'])->name('laporan-barang.print');
    Route::resource('permintaan', RequestController::class);
    Route::get('/permintaan-print', [RequestController::class, 'print'])->name('permintaan.print');
    Route::resource('requestDetail', RequestDetailController::class);
    Route::resource('financialreport', FinancialReportController::class);
    Route::get('/financial-report-print', [FinancialReportController::class, 'print'])->name('financial-report.print');
    Route::get('/monthly-summaries', [MonthlySummariesController::class, 'index'])->name('laporan-bulanan');
    Route::get('/monthly-summaries/print', [MonthlySummariesController::class, 'print'])->name('laporan-bulanan.print');
    Route::resource('pagu-anggaran',PaguAnggaranController::class);
    Route::get('/pagu-print',[PaguAnggaranController::class,'print'])->name('pagu.print');

    // rekap 
    Route::get('laporan', [RekapController::class, 'index'])->name('laporan.index');
    Route::get('laporan/invetarisBarang', [RekapController::class, 'item'])->name('laporan.item');
    Route::get('laporan/invetarisBarang/print', [RekapController::class, 'itemPrint'])->name('laporan.item.print');
    Route::get('laporan/penyediaanBarang', [RekapController::class, 'procrument'])->name('laporan.procrument');
    Route::get('laporan/penyediaanBarang/print', [RekapController::class, 'procrumentPrint'])->name('laporan.procrument.print');
    Route::get('laporan/pengeluaran', [RekapController::class, 'distribution'])->name('laporan.distribution');
    Route::get('laporan/pengeluaran/print', [RekapController::class, 'distributionPrint'])->name('laporan.distribution.print');
    Route::get('laporan/permintaan', [RekapController::class, 'permintaan'])->name('laporan.permintaan');
    Route::get('laporan/permintaan/print', [RekapController::class, 'permintaanPrint'])->name('laporan.permintaan.print');
    Route::get('laporan/keuangan', [RekapController::class, 'keuangan'])->name('laporan.keuangan');
    Route::get('laporan/keuangan/print', [RekapController::class, 'keuanganPrint'])->name('laporan.keuangan.print');
    Route::get('laporan/pagu/print',[RekapController::class,'pagu'])->name('laporan.pagu');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting', [SettingController::class, 'store'])->name('setting.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cek-distribution', function () {
    return \App\Models\Distribution::whereDate('tanggal_pengeluaraan', '2025-06-16')->get();
});


require __DIR__ . '/auth.php';
