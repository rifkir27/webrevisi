<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('mata_pelajaran');
            $table->float('nilai_harian')->nullable();
            $table->float('ulangan_harian_1')->nullable();
            $table->float('ulangan_harian_2')->nullable();
            $table->float('nilai_akhir_semester')->nullable();
            $table->float('rata_rata')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai');
    }
};
