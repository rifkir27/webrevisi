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
                        <input type="text" class="form-control" value="{{ $nilai->siswa->nama }} - {{ $nilai->siswa->jenis_kelamin }} - {{ $nilai->siswa->kelas }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label>Mata Pelajaran</label>
                        <select name="mata_pelajaran" class="form-control" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            <option value="Matematika" {{ $nilai->mata_pelajaran == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                            <option value="Bahasa Indonesia" {{ $nilai->mata_pelajaran == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                            <option value="Bahasa Inggris" {{ $nilai->mata_pelajaran == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                            <option value="IPA" {{ $nilai->mata_pelajaran == 'IPA' ? 'selected' : '' }}>IPA</option>
                            <option value="IPS" {{ $nilai->mata_pelajaran == 'IPS' ? 'selected' : '' }}>IPS</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nilai Harian</label>
                        <input type="number" name="nilai_harian" class="form-control nilai-input" min="0" max="100" step="0.01" value="{{ $nilai->nilai_harian }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Ulangan Harian 1</label>
                        <input type="number" name="ulangan_harian_1" class="form-control nilai-input" min="0" max="100" step="0.01" value="{{ $nilai->ulangan_harian_1 }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Ulangan Harian 2</label>
                        <input type="number" name="ulangan_harian_2" class="form-control nilai-input" min="0" max="100" step="0.01" value="{{ $nilai->ulangan_harian_2 }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Nilai Akhir Semester</label>
                        <input type="number" name="nilai_akhir_semester" class="form-control nilai-input" min="0" max="100" step="0.01" value="{{ $nilai->nilai_akhir_semester }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Rata-rata Nilai</label>
                        <input type="number" name="rata_rata" class="form-control" value="{{ $nilai->rata_rata }}" readonly>
                    </div>

                   

                    <button type="submit" class="btn btn-primary">Update</button>
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

    // Calculate initial average
    hitungRataRata();
});
</script>
@endsection