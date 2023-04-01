<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lamarans extends Model
{
    protected $fillable = [
       'id_karyawan' ,
       'id_users',
       'nama',
       'tpl',
       'tgl',
       'jk',
       'mulai',
       'email',
       'kota',
       'jabatan'
    ];
}
