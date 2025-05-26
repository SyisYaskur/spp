<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id(); // Ini otomatis jadi id_kelas
            $table->string('nama_kelas');
            $table->string('kompetensi_keahlian');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('kelas');
    }
};
