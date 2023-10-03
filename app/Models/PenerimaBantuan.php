<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $table = 'penerima_bantuan';
    protected $fillable = [
        'peserta_id',
        'bantuan',
        'sub_bantuan',
        'keterangan',
        'tgl_pemberian',
        'karyawan_id',
        'nominal_bantuan',
        'foto_dokumentasi'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
