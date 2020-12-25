<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddParticipantsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->enum('status', ['absent', 'present']);
            $table->string('nama_lengkap')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('nama_lengkap');
            $table->dropColumn('no_hp');
            $table->dropColumn('email');
        });
    }
}
