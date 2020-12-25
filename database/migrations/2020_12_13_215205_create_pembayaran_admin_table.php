<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_id');
            $table->string('tf_date');
            $table->string('tf_time');
            $table->string('bukti_tf');
            $table->enum('status', ['proses', 'berhasil', 'gagal']);
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
        Schema::dropIfExists('pembayaran_admin');
    }
}
