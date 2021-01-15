<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantriuulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santriuula', function (Blueprint $table) {
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
        Schema::dropIfExists('santriuula');
    }
}
