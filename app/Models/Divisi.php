<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisis';
    protected $fillable = [
        'nama_divisi',
        'deskripsi',
    ];

    //one to many
    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }
}
