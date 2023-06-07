<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tb_jurusan';
    protected $primaryKey = 'id_jurusan';

    protected $fillable = [];
}
