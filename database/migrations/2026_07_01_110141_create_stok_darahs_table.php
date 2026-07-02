<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stok_darahs', function (Blueprint $table) {
            $table->id();
            $table->string('golongan_darah')->unique();
            $table->integer('jumlah_kantong')->default(0);
            $table->timestamps();
        });

        DB::table('stok_darahs')->insert([
            ['golongan_darah' => 'A', 'jumlah_kantong' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['golongan_darah' => 'B', 'jumlah_kantong' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['golongan_darah' => 'AB', 'jumlah_kantong' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['golongan_darah' => 'O', 'jumlah_kantong' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_darahs');
    }
};
