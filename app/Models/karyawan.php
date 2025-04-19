<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir', 
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'email',
        'status',
        'foto',
    ];
}
