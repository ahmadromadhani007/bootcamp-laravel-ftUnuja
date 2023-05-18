<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index(){
        $data['mahasiswa_raw'] = DB::table('tb_mahasiswa')->get();
        $data['orm_mahasiswa'] = Mahasiswa::get();
        return $data;
    }
}
