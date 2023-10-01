<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $table = 'penerima_bantuan';
    protected $guarded = [];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }

    public function klaster()
    {
        return $this->belongsTo(Klaster::class);
    }

    public function subKlaster()
    {
        return $this->belongsTo(SubKlaster::class);
    }

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class);
    }
}
