<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('id_mahasiswa');
            $table->string('nim',10)->index();
            $table->string('nama',25)->index();
            $table->string('kelas',5);
            $table->string('jurusan',35);
            $table->string('jenis_kelamin',10)->nullable();
            $table->string('email',50)->nullable();
            $table->string('alamat',50)->nullable();
            $table->string('tanggal_lahir',50)->nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
}
