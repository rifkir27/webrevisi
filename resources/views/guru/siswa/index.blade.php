@extends('layouts.guru')

@section('title', 'Data Siswa')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Data Siswa</h2>
            <a href="{{ route('guru.siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $key => $siswa)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->kelas }}</td>
                        <td>{{ $siswa->email }}</td>
                        <td>
                            <a href="{{ route('guru.nilai.create', ['siswa_id' => $siswa->id]) }}" class="btn btn-sm btn-success">Input Nilai</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection