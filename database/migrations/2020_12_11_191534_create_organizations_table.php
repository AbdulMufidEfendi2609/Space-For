<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('website');
            $table->string('email');
            $table->string('no_telp');
            $table->string('logo_organisasi');
            $table->string('foto_perusahaan');
            $table->string('nama_bank');
            $table->string('no_rek');
            $table->string('nama_pemilik_rekening');
            $table->string('nama_cabang');
            $table->enum('kartu_identitas', ['npwp', 'ktp']);
            $table->string('foto_npwp')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('nama_npwp')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_ktp')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
