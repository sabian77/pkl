<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';

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

    //one to many
    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }   
}
