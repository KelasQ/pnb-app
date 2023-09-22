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
        Schema::create('tindakan_layanan', function (Blueprint $table) {
            $table->id();
            $table->integer('peserta_id');
            $table->string('jenis_tindakan', 100);
            $table->string('sub_tindakan', 100);
            $table->string('keterangan', 255);
            $table->text('desktipsi_masalah');
            $table->text('desktipsi_hasil');
            $table->text('rencana_tindak_lanjut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindakan_layanan');
    }
};
