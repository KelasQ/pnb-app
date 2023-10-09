<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKA extends Model
{
    use HasFactory;

    protected $table = 'ska';
    protected $fillable = [
        'jenis_ska',
        'deskripsi',
    ];
}
