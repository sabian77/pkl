<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use hasFactory;

    protected $fillable = ['nama_jabatan', 'deskripsi'];       
}
