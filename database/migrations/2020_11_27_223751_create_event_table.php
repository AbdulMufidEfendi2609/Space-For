<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('event_name');
            $table->text('deskripsi');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->string('lokasi');
            $table->string('image')->nullable();
            $table->string('kategori');
            $table->string('event_privacy');
            $table->string('package');
            $table->string('link');
            $table->string('shorten_link');
            $table->string('email_contact');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
