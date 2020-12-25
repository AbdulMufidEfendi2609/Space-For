<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('event_id');
            $table->string('organization_id');
            $table->string('tf_date');
            $table->string('tf_time');
            $table->string('bukti_tf');
            $table->enum('status', ['proses', 'berhasil', 'cancel']);
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
        Schema::dropIfExists('pembayarans');
    }
}
