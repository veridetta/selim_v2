<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mundurs extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'nama',
        'id_users',
        'nip',
        'file',
        'status'
    ];
}
