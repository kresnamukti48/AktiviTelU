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
        Schema::create('kegiatan_ukms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->string('lokasi_kegiatan');
            $table->text('deskripsi_kegiatan');
            $table->string('gambar_kegiatan')->nullable(); // URL atau path gambar kegiatan
            $table->foreignId('ukm_id')->constrained('ukms'); // FK ke UKM
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_ukms');
    }
};