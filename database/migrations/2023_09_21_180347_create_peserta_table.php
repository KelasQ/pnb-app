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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->integer('layanan_id');
            $table->integer('karyawan_id');
            $table->date('tgl_asesmen');
            $table->integer('kasus_id');
            $table->string('ket_kasus', 255);
            $table->integer('klaster_id');
            $table->integer('sub_klaster_id');
            $table->string('provinsi_kode', 100);
            $table->string('kota_kode', 100);
            $table->string('kecamatan_kode', 100);
            $table->string('kelurahan_kode', 100);
            $table->string('alamat_ktp', 255);
            $table->string('alamat_domisili', 255);
            $table->string('nama_ppks', 100);
            $table->string('nik', 15);
            $table->string('no_kk', 15);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 30);
            $table->string('agama', 30);
            $table->string('pendidikan', 100);
            $table->string('pekerjaan', 100);
            $table->integer('penghasilan_per_bulan');
            $table->string('nama_ibu', 100);
            $table->string('nama_ayah', 100);
            $table->string('pekerjaan_org_tua', 100);
            $table->string('no_hp_wali', 15);
            $table->string('dtiks', 100);
            $table->string('bantuan_pernah_diterima', 255);
            $table->text('hasil_asesmen');
            $table->text('rekomendasi');
            $table->text('intervensi');
            $table->date('tgl_pelayanan');
            $table->string('foto_ktp', 100);
            $table->string('foto_diri', 100);
            $table->string('foto_kk', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
