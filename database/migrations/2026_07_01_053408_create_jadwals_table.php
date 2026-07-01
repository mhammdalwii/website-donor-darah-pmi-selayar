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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->text('lokasi');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->enum('status', ['terjadwal', 'selesai', 'batal'])->default('terjadwal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
