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
        if(!Schema::hasColumn('pagu_anggarans', 'category_id')){
            Schema::table('pagu_anggarans', function (Blueprint $table) {
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagu_anggarans', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
};
