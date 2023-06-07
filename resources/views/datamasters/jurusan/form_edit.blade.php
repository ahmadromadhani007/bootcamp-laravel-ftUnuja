@extends('layouts.main')

@section('title', 'Jurusan')

@section('contain')
    <div class="container">
        <form method="POST" action="{{ route('jurusan.update', $row->id_jurusan) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="" class="form-label">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" value="{{ $row->nama_jurusan }}" class="form-control" required
                placeholder="Nama Jurusan" />
            <br>
            <br>
            <label class="form-label">Status : </label>
            <div class="col-sm-9">
                <input type="radio" name="status" value="aktif" checked> Aktif
                <input type="radio" name="status" value="non aktif"> Non Aktif
            </div>
            <br>
            <div class="col-sm-10 ">
                <a class="btn btn-info" title="Kembali" href="/jurusan">
                    <i class="bi bi-arrow-left-square"></i> Kembali</a>
                &nbsp;
                <button type="submit" class="btn btn-primary" title="Simpan jurusan">
                    <i class="bi bi-save"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection
