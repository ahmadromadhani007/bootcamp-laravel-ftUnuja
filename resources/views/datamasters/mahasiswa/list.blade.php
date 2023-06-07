@extends('layouts.main')

@section('title', 'mahasiswa')

@section('contain')
    <div class="container">
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary" style="margin-bottom: 1em;">Tambah</a>
        <div class="bg-white rounded-2 p-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Semester</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tahun Masuk</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</th>
                            <td>{{ $row->nim }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->nama_jurusan }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->semester }}</td>
                            <td>{{ $row->no_telefon }}</td>
                            <td>{{ $row->tgl_lahir }}</td>
                            <td>{{ $row->jenkel }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->tahun_masuk }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <div class="d-inline-flex gap-1 align-items-center">
                                    <a class="text-warning btn btn-sm p-0"
                                        href="{{ route('mahasiswa.edit', $row->id_mahasiswa) }}">Edit</a> |
                                    {{-- <a href="{{ route('mahasiswa.destroy', $row->id_mahasiswa) }}" onclick="confirmDelete(event)" class="text-danger text-decoration-none">Hapus</a> --}}
                                    <a href="#" class="text-danger btn btn-sm p-0 text-decoration-none"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deletemahasiswa{{ $row->id_mahasiswa }}">Hapus</a>
                                </div>
                            </td>
                            <div class="modal fade" tabindex="-1" id="deletemahasiswa{{ $row->id_mahasiswa }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Hapus Data {{ $row->nama }}</h3>

                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                            </div>
                                            <!--end::Close-->
                                        </div>

                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Akan Menghapus Data Ini ?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('mahasiswa.destroy', $row->id_mahasiswa) }}"
                                                method="POST" id="formDelete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container mt-3">{{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
