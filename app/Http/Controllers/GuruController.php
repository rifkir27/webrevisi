<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function dashboard()
    {
        $siswas = Siswa::all();
        return view('guru.dashboard', compact('siswas'));
    }

    public function siswaIndex()
    {
        $siswas = Siswa::all();
        return view('guru.siswa.index', compact('siswas'));
    }

    public function siswaCreate()
    {
        return view('guru.siswa.create');
    }

    public function siswaStore(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'kelas' => 'required',
            'email' => 'required|email|unique:siswas',
            'password' => 'required|min:6'
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('guru.siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function nilaiIndex()
    {
        $nilai = Nilai::with('siswa')->get();
        return view('guru.nilai.index', compact('nilai'));
    }

    public function nilaiCreate()
    {
        $siswas = Siswa::all();
        return view('guru.nilai.create', compact('siswas'));
    }

    public function nilaiStore(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mata_pelajaran' => 'required',
            'nilai_harian' => 'required|numeric|min:0|max:100',
            'ulangan_harian_1' => 'required|numeric|min:0|max:100',
            'ulangan_harian_2' => 'required|numeric|min:0|max:100',
            'nilai_akhir_semester' => 'required|numeric|min:0|max:100',
        ]);
    
        // Calculate average
        $nilai = [
            $request->nilai_harian,
            $request->ulangan_harian_1,
            $request->ulangan_harian_2,
            $request->nilai_akhir_semester
        ];
        
        $rata_rata = array_sum($nilai) / count($nilai);
    
        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai_harian' => $request->nilai_harian,
            'ulangan_harian_1' => $request->ulangan_harian_1,
            'ulangan_harian_2' => $request->ulangan_harian_2,
            'nilai_akhir_semester' => $request->nilai_akhir_semester,
            'rata_rata' => $rata_rata,
            'keterangan' => $request->keterangan
        ]);
    
        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil ditambahkan');
    }

    public function nilaiEdit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $siswas = Siswa::all();
        return view('guru.nilai.edit', compact('nilai', 'siswas'));
    }

    public function nilaiUpdate(Request $request, $id)
    {
        $request->validate([
            'mata_pelajaran' => 'required',
            'nilai_harian' => 'required|numeric|min:0|max:100',
            'ulangan_harian_1' => 'required|numeric|min:0|max:100',
            'ulangan_harian_2' => 'required|numeric|min:0|max:100',
            'nilai_akhir_semester' => 'required|numeric|min:0|max:100',
        ]);
    
        $nilai = Nilai::findOrFail($id);
        
        // Calculate average
        $nilaiArray = [
            $request->nilai_harian,
            $request->ulangan_harian_1,
            $request->ulangan_harian_2,
            $request->nilai_akhir_semester
        ];
        $rata_rata = array_sum($nilaiArray) / count($nilaiArray);
    
        $nilai->update([
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai_harian' => $request->nilai_harian,
            'ulangan_harian_1' => $request->ulangan_harian_1,
            'ulangan_harian_2' => $request->ulangan_harian_2,
            'nilai_akhir_semester' => $request->nilai_akhir_semester,
            'rata_rata' => $rata_rata,
            'keterangan' => $request->keterangan
        ]);
    
        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil diupdate');
    }

    public function nilaiDestroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil dihapus');
    }

    public function editSiswa(Siswa $siswa)
    {
        return view('guru.siswa.edit', compact('siswa'));
    }

    public function updateSiswa(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:siswas,email,' . $siswa->id,
        ]);
    
        $siswa->update($request->all());
    
        return redirect()->route('guru.siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroySiswa(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('guru.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}