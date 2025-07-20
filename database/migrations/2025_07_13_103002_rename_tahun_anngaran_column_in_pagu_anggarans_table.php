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
        Schema::table('pagu_anggarans', function (Blueprint $table) {
            $table->renameColumn('tahun_anngaran', 'tahun_anggaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagu_anggarans', function (Blueprint $table) {
            $table->renameColumn('tahun_anggaran', 'tahun_anngaran');
        });
    }
};
