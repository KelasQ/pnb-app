<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'tindakan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'peserta_id',
        'tindakan',
        'sub_layanan',
        'kategori_asrama',
        'nama_asrama',
        'intervensi',
        'deskripsi_layanan',
        'tgl_terminasi',
        'alasan_terminasi',
        'syarat_dan_ketentuan',
        'deskripsi_masalah',
        'deskripsi_hasil',
        'rencana_tindak_lanjut',
        'tgl_masuk',
        'tgl_keluar',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
