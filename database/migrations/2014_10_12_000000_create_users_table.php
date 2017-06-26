<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idUser');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('department');
            $table->integer('fk_idSecurity');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('fk_idSecurity')
                  ->references('idSecurity')->on('securities')
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
        Schema::dropIfExists('users');
    }
}
