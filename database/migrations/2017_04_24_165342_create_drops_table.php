<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {                                               

            Schema::create('drops', function (Blueprint $table) {
            $table->increments('idDrop');
            $table->dateTime('dropReceivedDate');
            $table->string('dropperCompanyName');       
            $table->string('DropReceiver');
            $table->integer('dropIdUser');
            $table->string('dropperName');
            $table->dateTime('droppedWhen');
            $table->string('dropItem');
            $table->smallInteger('dropImportance');
            $table->tinyInteger('dropType');
            $table->string('dropperCitizenCard');
            $table->integer('dropItem_iddropItem');

            $table->foreign('dropIdUser')
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
        Schema::dropIfExists('drops');
    }
}