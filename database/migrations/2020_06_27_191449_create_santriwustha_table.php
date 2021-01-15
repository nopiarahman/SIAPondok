<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantriwusthaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santriwustha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaLengkap');
            $table->string('namaPanggilan');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->enum('jk', ['Laki laki', 'Perempuan']);
            $table->string('anakKe');
            $table->string('bahasaKeseharian')->nullable()->default('Indonesia');
            $table->enum('golonganDarah', ['A', 'B','AB','O'])->nullable();
            $table->string('penyakit')->nullable()->default('Tidak ada');
            $table->enum('baju', ['XS', 'S','M','L','XL','XXL']);
            $table->string('sekolahSebelum');
            $table->string('alamatSekolahSebelum');
            $table->string('nisnSekolahSebelum');
            $table->string('namaAyah');
            $table->string('namaPanggilanAyah')->nullable();
            $table->string('pendidikanAyah');
            $table->date('tanggalLahirAyah');
            $table->string('pekerjaanAyah');
            $table->string('alamatAyah');
            $table->integer('penghasilanAyah');
            $table->string('teleponAyah');
            $table->string('emailAyah')->nullable();
            $table->string('namaIbu');
            $table->string('namaPanggilanIbu')->nullable();
            $table->string('tempatLahirIbu');
            $table->date('tanggalLahirIbu')->nullable();
            $table->string('pendidikanIbu')->nullabel();
            $table->string('pekerjaanIbu')->nullable();
            $table->string('alamatIbu')->nullable();
            $table->integer('penghasilanIbu')->nullable();
            $table->string('teleponIbu');
            $table->string('emailIbu')->nullable();
            $table->string('namaWali');
            $table->string('namaPanggilanWali')->nullable();
            $table->string('tempatLahirWali')->nullable();
            $table->date('tanggalLahirWali')->nullable();
            $table->string('pendidikanWali')->nullable();
            $table->string('pekerjaanWali');
            $table->string('alamatWali');
            $table->string('penghasilanWali');
            $table->string('teleponWali');
            $table->string('emailWali')->nullable();
            $table->string('pasPhoto')->nullable();
            $table->string('suratWaliSantri')->nullable();
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
        Schema::dropIfExists('santriwustha');
    }
}
