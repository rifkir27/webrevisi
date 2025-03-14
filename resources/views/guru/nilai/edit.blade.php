@extends('layouts.guru')

@section('title', 'Edit Nilai')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Edit Nilai Siswa</h4>
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

                <form action="{{ route('guru.nilai.update', $nilai->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Siswa</label>
                        <select name="siswa_id" class="form-control" required>
                            <option value="">Pilih Siswa</option>
                            @foreach($siswas as $siswa)
                                <option value="{{ $siswa->id }}" {{ $nilai->siswa_id == $siswa->id ? 'selected' : '' }}>
                                    {{ $siswa->nama }} - {{ $siswa->kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Mata Pelajaran</label>
                        <select name="mata_pelajaran" class="form-control" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach(['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'IPA', 'IPS'] as $mapel)
                                <option value="{{ $mapel }}" {{ $nilai->mata_pelajaran == $mapel ? 'selected' : '' }}>
                                    {{ $mapel }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Nilai</label>
                        <input type="number" name="nilai" class="form-control" min="0" max="100" 
                               value="{{ $nilai->nilai }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3">{{ $nilai->keterangan }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('guru.nilai.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection