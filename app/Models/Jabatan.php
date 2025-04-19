<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use hasFactory;

    protected $table = 'jabatans';

    protected $fillable = ['nama_jabatan', 'deskripsi'];       

    //one to many
    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }
}
