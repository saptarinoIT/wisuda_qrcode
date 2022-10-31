<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisuda', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('nim')->primary()->unique();
            $table->string('nama_lengkap', 100);
            $table->string('ttl', 100);
            $table->text('judul_ta');
            $table->string('ipk', 10);
            $table->enum('jurusan', ['teknik informatika', 'teknik elektro']);
            $table->enum('kehadiran', ['ya', 'tidak'])->default('tidak');
            $table->year('tahun');
            $table->string('foto');
            $table->enum('orangtua', ['ya', 'tidak'])->default('tidak');
            $table->enum('pendamping', ['ya', 'tidak'])->default('tidak');
            $table->enum('status', ['diterima', 'diproses'])->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisuda');
    }
};
