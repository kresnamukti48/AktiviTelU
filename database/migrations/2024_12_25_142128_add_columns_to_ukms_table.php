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
        Schema::table('ukms', function (Blueprint $table) {
            $table->enum('kategori_ukm', ['kesenian', 'sosial', 'penalaran', 'olahraga', 'kerohanian'])->after('deskripsi_ukm');  
            $table->string('instagram_ukm')->after('kategori_ukm');  
            $table->string('email_ukm')->after('instagram_ukm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ukms', function (Blueprint $table) {
            $table->dropColumn(['kategori_ukm', 'instagram_ukm', 'email_ukm']);
        });
    }
};
