<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivers', function (Blueprint $table) {        #idDeliver									

            $table->increments('idDeliver');
            $table->datetime('deEntryTime');
            $table->float('entryWeight',8,2);
            $table->float('exitWeight',8,2);;
            $table->string('deFirmSupplier');
            $table->string('deDriverName');
            $table->string('vehicleRegistry');
            $table->integer('deIdUser');
            $table->datetime('deExitTime');
            $table->integer('deType'); 
            $table->timestamps();

            $table->foreign('deIdUser')
                  ->references('idUser')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivers');
    }
}
