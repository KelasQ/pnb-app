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
        Schema::create('tindakan_terminasi', function (Blueprint $table) {
            $table->id();
            $table->integer('peserta_id');
            $table->date('tgl_terminasi');
            $table->text('alasan_terminasi');
            $table->text('syarat_dan_ketentuan');
            $table->text('deskripsi_masalah');
            $table->text('deskripsi_hasil');
            $table->text('rencana_tindak_lanjut');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindakan_terminasi');
    }
};
