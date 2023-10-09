<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiPenerimaanBantuan extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi_penerima_bantuan';
    protected $fillable = ['penerima_bantuan_id', 'foto_dokumentasi'];
}
