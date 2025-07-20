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
        Schema::create('procruments', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pengadaan');
            $table->string('tanggal_pengadaan');
            $table->string('suplier_name');
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->string('jumlah_barang');
            $table->bigInteger('total_biaya');
            $table->enum('status',['diterima','belum diterima']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procruments');
    }
};
