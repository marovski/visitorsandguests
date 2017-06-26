<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('idMeeting');
            $table->dateTime('meetStartDate');
            $table->string('room');
            $table->time('entryTime');
            $table->time('exitTime');
            $table->tinyInteger('confidentialy');
            $table->integer('sensibility');
            $table->integer('meetStatus');
            $table->string('visitReason');
            $table->integer('meetIdHost');
            $table->datetime('meetEndDate');
            $table->char('meetCompanyName');
            $table->string('meetingName');
            $table->timestamps();

            $table->foreign('meetIdHost')
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
        Schema::dropIfExists('meetings');
    }
}