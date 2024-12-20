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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->text('deskripsi_event');
            $table->date('tanggal_event');
            $table->string('lokasi_event');
            $table->string('gambar_event')->nullable(); // URL atau path gambar poster event
            $table->foreignId('ukm_id')->constrained('ukms'); // FK ke UKM yang menyelenggarakan event
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};