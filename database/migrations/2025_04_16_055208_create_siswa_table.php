<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn')->primary(); // tidak auto increment
            $table->string('nis');
            $table->string('nama');
            $table->foreignId('id_kelas')->constrained('kelas')->onDelete('cascade');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->foreignId('id_spp')->constrained('spp')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('siswa');
    }
};
