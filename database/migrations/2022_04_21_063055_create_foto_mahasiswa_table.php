<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('image')->after('jurusan')->nullable();
        });
    }

    /**
     * Reverse the migrations.The requested resource /storage was not found on this server.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('image');
    }
}
