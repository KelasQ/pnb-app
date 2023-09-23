<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKlaster extends Model
{
    protected $table = 'sub_klaster';
    protected $fillable = ['klaster_id', 'sub_klaster'];

    public function klaster()
    {
        return $this->belongsTo(Klaster::class);
    }
}
