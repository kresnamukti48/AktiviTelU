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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // FK ke user (mahasiswa)
            $table->string('nim')->unique();
            $table->string('jurusan');
            $table->string('angkatan');
            $table->foreignId('ukm_id')->constrained('ukms'); // FK ke UKM
            $table->enum('role_member', ['ketua', 'wakil ketua', 'anggota']); // Role anggota UKM
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
