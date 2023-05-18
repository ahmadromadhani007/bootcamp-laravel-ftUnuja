<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'nim';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nama',
        'id_jurusan',
        'alamat',
        'semester',
        'no_telefon',
        'tgl_lahir',
        'jenkel',
        'email',
        'tahun_masuk',
        'status'
    ];
}
