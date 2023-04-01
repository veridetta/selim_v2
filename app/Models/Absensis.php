<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Absensis extends Model
{
    use HasFactory,Notifiable;
    protected $fillable=[
        'id_users',
        'id_karyawan',
        'nama',
        'jabatan',
        'tanggal',
        'in',
        'out',
        'status'
    ];
}
