<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //user
            $table->string('nama_lengkap');
            $table->string('nis')->unique();
            $table->string('kelas');

            //kantin
            $table->string('nama_kantin');
            $table->string('nama_pemilik');

            //both
            $table->id();
            $table->string('uuid');
            $table->string('user_id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nomor_telepon')->unique();
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
        Schema::dropIfExists('users');
    }
}
