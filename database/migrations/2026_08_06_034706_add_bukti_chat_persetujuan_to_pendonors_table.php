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
        Schema::table('pendonors', function (Blueprint $table) {
            $table->string('bukti_chat_persetujuan')->nullable()->after('tanggal_donor_terakhir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendonors', function (Blueprint $table) {
            $table->dropColumn('bukti_chat_persetujuan');
        });
    }
};
