<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['role_id', 'nama', 'email', 'telp', 'foto', 'username', 'password'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
