<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

class CreateProgressProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_proyek', function (Blueprint $table) {
            $table->increments('id');
            $table->text('lokasi');
            $table->string('progress');
            $table->string('status');
            $table->string('persentase');
            $table->integer('id_proyek');
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
        Schema::dropIfExists('progress_proyek');
    }
}
