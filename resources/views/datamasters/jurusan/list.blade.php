@extends('layouts.main')

@section('title', 'Jurusan')

@section('contain')
    <div class="container">
        <a href="{{ route('jurusan.create') }}" class="btn btn-primary" style="margin-bottom: 1em;">Tambah</a>
        <div class="bg-white rounded-2 p-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jurusan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</th>
                            <td>{{ $row->nama_jurusan }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <div class="d-inline-flex gap-1 align-items-center">
                                    <a class="text-warning btn btn-sm p-0"
                                        href="{{ route('jurusan.edit', $row->id_jurusan) }}">Edit</a> |
                                    {{-- <a href="{{ route('jurusan.destroy', $row->id_jurusan) }}" onclick="confirmDelete(event)" class="text-danger text-decoration-none">Hapus</a> --}}
                                    <a href="#" class="text-danger btn btn-sm p-0 text-decoration-none"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deletejurusan{{ $row->id_jurusan }}">Hapus</a>
                                </div>
                            </td>
                            <div class="modal fade" tabindex="-1" id="deletejurusan{{ $row->id_jurusan }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Hapus Data {{ $row->nama_jurusan }}</h3>

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
                                            <form action="{{ route('jurusan.destroy', $row->id_jurusan) }}" method="POST"
                                                id="formDelete">
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
