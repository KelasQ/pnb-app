<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubBantuan extends Model
{
    protected $table = 'sub_bantuan';
    protected $fillable = ['bantuan_id', 'sub_bantuan'];

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class);
    }
}
