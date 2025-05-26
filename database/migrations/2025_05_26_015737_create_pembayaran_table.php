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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran'); // Primary key khusus
            $table->string('nisn'); // Foreign key ke tabel siswa
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');
            
            $table->foreignId('id_spp')->constrained('spp')->onDelete('cascade');
            
            $table->enum('status_pembayaran', ['lunas', 'belum_lunas'])->default('belum_lunas');
            $table->date('tanggal_pembayaran')->nullable(); // Bisa diisi saat pembayaran
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
