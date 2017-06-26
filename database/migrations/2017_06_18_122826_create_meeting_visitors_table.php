<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_visitor', function (Blueprint $table) {
            $table->increments('visitor_idVisitor');
            $table->increments('meeting_idMeeting');

            $table->timestamps();

            $table->foreign('visitor_idVisitor')
                  ->references('idVisitor')->on('visitors')
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
        Schema::dropIfExists('meeting_visitor');
    }
}
