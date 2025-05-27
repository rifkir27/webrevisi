@extends('layouts.guru')
@include('layouts.styles')
@section('title', 'Data Nilai')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Data Nilai Siswa</h2>
            <a href="{{ route('guru.nilai.create') }}" class="btn btn-primary">Tambah Nilai</a>
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
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Harian</th>
                        <th>UH 1</th>
                        <th>UH 2</th>
                        <th>Nilai Akhir Semester</th>
                        <th>Rata-rata</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilai as $key => $n)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $n->siswa->nama }}</td>
                        <td>{{ $n->siswa->jenis_kelamin }}</td>
                        <td>{{ $n->siswa->kelas }}</td>
                        <td>{{ $n->mata_pelajaran }}</td>
                        <td>{{ $n->nilai_harian }}</td>
                        <td>{{ $n->ulangan_harian_1 }}</td>
                        <td>{{ $n->ulangan_harian_2 }}</td>
                        <td>{{ $n->nilai_akhir_semester }}</td>
                        <td>{{ number_format($n->rata_rata, 2) }}</td>
                      
                        <td>
                            <a href="{{ route('guru.nilai.edit', $n->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('guru.nilai.destroy', $n->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection