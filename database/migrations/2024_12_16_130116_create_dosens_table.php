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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // FK ke user (dosen)
            $table->string('nip')->unique();
            $table->string('fakultas');
            $table->foreignId('ukm_id')->nullable()->constrained('ukms'); // FK ke UKM (opsional, jika terlibat)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
