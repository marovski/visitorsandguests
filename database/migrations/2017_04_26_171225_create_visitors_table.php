<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('idVisitor');
            $table->string('visitorName');
            $table->string('visitorCitizenCard');
            $table->string('visitorNPhone');
            $table->string('visitorEmail');
            $table->tinyInteger('escorted');
            $table->tinyInteger('wifiAccess');
            $table->string('visitorCompanyName');
            $table->smallInteger('visitorCitizenCardType');
            $table->tinyInteger('visitorDangerousGood');
            $table->string('visitorDeclaredGood');


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
        Schema::dropIfExists('visitors');
    }
}
