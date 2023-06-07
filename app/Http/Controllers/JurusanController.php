<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jurusan;


class JurusanController extends Controller
{
    public function index(){
        // $data['mahasiswa_raw'] = DB::table('tb_mahasiswa')->get();
        // $data['orm_mahasiswa'] = Mahasiswa::get();
        // return $data;

        $data = Jurusan::orderBy('id_jurusan', 'ASC')->paginate(10);
    return view("datamasters.jurusan.list", compact("data"));
    }

    public function create()
    {
        return view('datamasters.jurusan.form_create');

    }

    public function store(Request $request)
    {
        Jurusan::insert(
            [
                'nama_jurusan' => $request->nama_jurusan,
                'status' => $request->status,
                'created_at' => now(),
            ]
        );

        return redirect("/jurusan")->with(
            "success",
            "Data jurusan Baru Berhasil Disimpan"
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
    public function edit($id_jurusan)
    {
        $row = Jurusan::find($id_jurusan);
        return view("datamasters.jurusan.form_edit", compact("row"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jurusan)
    {
        DB::table('tb_jurusan')->where('id_jurusan', $id_jurusan)->update(
            [
                'nama_jurusan' => $request->nama_jurusan,
                'status' => $request->status,
                'updated_at' => now(),
            ]
        );

        return redirect("/jurusan")->with(
            "success",
            "Data jurusan Berhasil Diperbaharui"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jurusan)
    {
        // mahasiswa::where('id_jurusan', $id_jurusan)->delete();
        $deleteJurusan = Jurusan::where("id_jurusan", $id_jurusan)->first();
        $deleteJurusan->delete();

        return redirect("/jurusan")->with(
            "success",
            "Data jurusan Berhasil Dihapus"
        );
    }
}
