<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'username',
        'password',
        'nama_petugas',
    ];

    protected $hidden = [
        'password',
    ];
}
