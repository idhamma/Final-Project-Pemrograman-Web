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
        Schema::create('motorcycle', function (Blueprint $table) {
            $table->id();
            $table->string('no_plat')->unique();
            $table->string('nama_motor');
            $table->string('brand');
            $table->string('kategori');
            $table->integer('tahun');
            $table->string('lokasi');

            $table->integer('tarif');
            $table->boolean('status_peminjaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_motorcycle');
    }
};
