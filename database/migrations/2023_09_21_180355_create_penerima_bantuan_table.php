<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penerima_bantuan', function (Blueprint $table) {
            $table->id();
            $table->integer('peserta_id');
            $table->integer('bantuan_id');
            $table->integer('sub_bantuan_id');
            $table->date('tgl_pemberian');
            $table->integer('karyawan_id');
            $table->integer('nominal_bantuan');
            $table->string('foto_dokumentasi', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bantuan');
    }
};
