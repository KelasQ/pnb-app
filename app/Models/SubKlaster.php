<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKlaster extends Model
{
    use HasFactory;
    protected $table = 'sub_klaster';
    protected $fillable = ['klaster_id', 'sub_klaster'];
}
