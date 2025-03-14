@extends('layouts.guru')

@section('title', 'Tambah Nilai')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Input Nilai Siswa</h4>
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

                <form action="{{ route('guru.nilai.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Siswa</label>
                        <select name="siswa_id" class="form-control" required>
                            <option value="">Pilih Siswa</option>
                            @foreach($siswas as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama }} - {{ $siswa->kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Mata Pelajaran</label>
                        <select name="mata_pelajaran" class="form-control" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nilai Harian</label>
                        <input type="number" name="nilai_harian" class="form-control nilai-input" min="0" max="100" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label>Ulangan Harian 1</label>
                        <input type="number" name="ulangan_harian_1" class="form-control nilai-input" min="0" max="100" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label>Ulangan Harian 2</label>
                        <input type="number" name="ulangan_harian_2" class="form-control nilai-input" min="0" max="100" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label>Nilai Akhir Semester</label>
                        <input type="number" name="nilai_akhir_semester" class="form-control nilai-input" min="0" max="100" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label>Rata-rata Nilai</label>
                        <input type="number" name="rata_rata" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('guru.nilai.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nilaiInputs = document.querySelectorAll('.nilai-input');
    const rataRataInput = document.querySelector('input[name="rata_rata"]');

    function hitungRataRata() {
        let total = 0;
        let count = 0;
        
        nilaiInputs.forEach(input => {
            if (input.value !== '') {
                total += parseFloat(input.value);
                count++;
            }
        });

        if (count > 0) {
            const rataRata = total / count;
            rataRataInput.value = rataRata.toFixed(2);
        } else {
            rataRataInput.value = '';
        }
    }

    nilaiInputs.forEach(input => {
        input.addEventListener('input', hitungRataRata);
    });
});
</script>
@endsection