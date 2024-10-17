<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datsis extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nis',
        'nisn',
        'jk',
        'umur',
        'jurusan',
    ];
    protected $table = 'data_siswa';
}
