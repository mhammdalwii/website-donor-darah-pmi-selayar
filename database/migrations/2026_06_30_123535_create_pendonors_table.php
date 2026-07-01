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
        Schema::create('pendonors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            // $table->string('nik', 16)->unique();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->string('rhesus', 1)->default('+');
            $table->string('nomor_telepon');
            $table->date('tanggal_donor_terakhir')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendonors');
    }
};
