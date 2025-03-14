<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    
    protected $fillable = [
        'siswa_id',
        'mata_pelajaran',
        'nilai_harian',
        'ulangan_harian_1',
        'ulangan_harian_2',
        'nilai_akhir_semester',
        'rata_rata',
        'keterangan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}