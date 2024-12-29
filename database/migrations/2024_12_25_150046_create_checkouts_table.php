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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id('id'); 
            $table->foreignId('tiket_id')->constrained('tickets')->onDelete('cascade');  
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->integer('jumlah_tiket'); 
            $table->integer('total_harga'); 
            $table->date('tanggal_checkout'); 
            $table->enum('status', ['pending', 'success', 'failed', 'expired', 'canceled'])->default('pending');  
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
