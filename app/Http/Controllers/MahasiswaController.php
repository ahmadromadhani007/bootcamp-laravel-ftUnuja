<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Jurusan;


class MahasiswaController extends Controller
{
    public function index(){
        // $data['mahasiswa_raw'] = DB::table('tb_mahasiswa')->get();
        // $data['orm_mahasiswa'] = Mahasiswa::get();
        // return $data;

        $data = DB::table("tb_mahasiswa")
        ->join(
            "tb_jurusan",
            "tb_jurusan.id_jurusan",
            "=",
            "tb_mahasiswa.id_jurusan"
        )
        ->select(
            "tb_mahasiswa.*",
            "tb_jurusan.nama_jurusan"
        )
        ->where("tb_mahasiswa.deleted_at", "=", null)
        ->orderBy("id_mahasiswa", "DESC")
        ->paginate(5);
    return view("datamasters.mahasiswa.list", compact("data"));
    }

    public function create()
    {
        $ar_jur = Jurusan::all();
        // dd($ar_satpend);
        //arahkan ke form input data
        return view("datamasters.mahasiswa.form_create", compact("ar_jur"));
    }

    public function store(Request $request)
    {
        Mahasiswa::insert([
            "nim" => $request->nim,
            "nama" => $request->nama,
            "id_jurusan" => $request->id_jurusan,
            "alamat" => $request->alamat,
            "semester" => $request->semester,
            "no_telefon" => $request->no_telefon,
            "tgl_lahir" => $request->tgl_lahir,
            "jenkel" => $request->jenkel,
            "email" => $request->email,
            "tahun_masuk" => $request->tahun_masuk,
            "status" => $request->status,
            "created_at" => now()
        ]);

        return redirect("/mahasiswa")->with(
            "success",
            "Data mahasiswa Baru Berhasil Disimpan"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_mahasiswa)
    {
        $row = Jurusan::find($id_mahasiswa);
        return view("datamasters.mahasiswa.form_edit", compact("row"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mahasiswa)
    {
        DB::table("tb_mahasiswa")
            ->where("id_mahasiswa", $id_mahasiswa)
            ->update([
                "nim" => $request->nim,
                "nama" => $request->nama,
                "id_jurusan" => $request->id_jurusan,
                "alamat" => $request->alamat,
                "semester" => $request->semester,
                "no_telefon" => $request->no_telefon,
                "tgl_lahir" => $request->tgl_lahir,
                "jenkel" => $request->jenkel,
                "email" => $request->email,
                "tahun_masuk" => $request->tahun_masuk,
                "status" => $request->status,
                "updated_at" => now(),
            ]);

        return redirect("/mahasiswa")->with(
            "success",
            "Data mahasiswa Berhasil Diperbaharui"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mahasiswa)
    {
        // mahasiswa::where('id_mahasiswa', $id_mahasiswa)->delete();
        $deleteJurusan = Jurusan::where("id_mahasiswa", $id_mahasiswa)->first();
        $deleteJurusan->delete();

        return redirect("/mahasiswa")->with(
            "success",
            "Data mahasiswa Berhasil Dihapus"
        );
    }
}
