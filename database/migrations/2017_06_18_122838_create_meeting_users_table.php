<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_user', function (Blueprint $table) {
            $table->increments('user_idUser');
            $table->increments('meeting_idMeeting');
            
            $table->timestamps();

            $table->foreign('user_idUser')
                  ->references('idUser')->on('users')
                  ->onDelete('cascade');

            $table->foreign('meeting_idMeeting')
                  ->references('idMeeting')->on('meetings')
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
        Schema::dropIfExists('meeting_user');
    }
}
