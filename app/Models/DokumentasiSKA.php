<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiSKA extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi_ska';
    protected $fillable = ['ska_id', 'foto_dokumentasi'];
}
