<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaans';
    protected $fillable = [
        'id_karyawan',
        'id_divisi',
        'id_jabatan',
        'tanggal_mulai',
        'gaji',
    ];

    //one to many
    public function karyawan()
    {
        return $this->belongsTo(karyawan::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function jabatan()   
    {
        return $this->belongsTo(Jabatan::class);
    }
}

