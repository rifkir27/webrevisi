@extends('layouts.guru')
@include('layouts.styles')
@section('title', 'Edit Siswa')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Edit Siswa</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('guru.siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>NIS</label>
                        <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control" value="{{ $siswa->kelas }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $siswa->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('guru.siswa.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection