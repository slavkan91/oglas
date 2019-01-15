<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOglasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oglas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategorija_id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->string('ime');
            $table->float('cijena', 8,2);
            $table->integer('kilometraza');
            $table->year('godiste');
            $table->string('slika')->default(NULL);
            $table->boolean('odobreno');
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
        Schema::dropIfExists('oglas');
    }
}
