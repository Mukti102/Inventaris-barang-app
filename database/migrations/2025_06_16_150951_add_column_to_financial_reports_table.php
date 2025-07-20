<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('financial_reports', function (Blueprint $table) {
            $table->text('rincian_transaksi');
            $table->enum('periode',['bulanan','tahunan'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financials_reports', function (Blueprint $table) {
            $table->dropColumn('rincian_transaksi');
            $table->string('periode');
        });
    }
};
