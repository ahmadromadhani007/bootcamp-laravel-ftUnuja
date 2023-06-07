@extends('layouts.main')

@section('title', 'Mahasiswa')

@section('contain')
    @php
        $ar_jur = App\Models\Jurusan::all();
    @endphp
    <div class="container">
        <form method="POST" action="{{ route('mahasiswa.update', $row->id_mahasiswa) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="" class="form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" required placeholder="NIM" />
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="" class="form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required placeholder="Nama" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label">Jurusan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_jurusan">
                        <option disabled selected>-- Jurusan --</option>
                        @foreach ($ar_jur as $jur)
                            @php
                                $sel = $jur->id_jurusan == $row->id_jurusan ? 'selected' : '';
                            @endphp
                            <option value="{{ $jur->id_jurusan }}" {{ $sel }}>
                                {{ $jur->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="" class="form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" required placeholder="Alamat" />
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="" class="form-label">Semester</label>
                <div class="col-sm-10">
                    <input type="text" name="semester" class="form-control" required placeholder="Semester" />
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="" class="form-label">No Tlpn</label>
                <div class="col-sm-10">
                    <input type="text" name="no_telefon" class="form-control" required placeholder="No Tlpn" />
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="" class="form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal_lahir" class="form-control" required placeholder="Tanggal Lahir" />
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label class="form-label">Jenis Kelamin : </label>
                <div class="col-sm-9">
                    <input type="radio" name="jenkel" value="Laki-laki" checked> Laki-laki
                    <input type="radio" name="jenkel" value="Perempuan"> Perempuan
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="" class="form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" required placeholder="Email" />
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="" class="form-label">Tahun Masuk</label>
                <div class="col-sm-10">
                    <input type="text" name="tahun_masuk" class="form-control" required placeholder="Tahun Masuk" />
                </div>
            </div>
            <br>
            <label class="form-label">Status : </label>
            <div class="col-sm-9">
                <input type="radio" name="status" value="aktif" checked> Aktif
                <input type="radio" name="status" value="nonaktif"> Non-Aktif
            </div>
            <br>
            <div class="col-sm-10 ">
                <a class="btn btn-info" title="Kembali" href="/mahasiswa">
                    <i class="bi bi-arrow-left-square"></i> Kembali</a>
                &nbsp;
                <button type="submit" class="btn btn-primary" title="Simpan mahasiswa">
                    <i class="bi bi-save"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection
