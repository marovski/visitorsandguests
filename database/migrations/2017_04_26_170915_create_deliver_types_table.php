<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliverTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliver_types', function (Blueprint $table) { #					

            $table->increments('idDeliverType');
            $table->string('materialDetails');
            $table->float('quantitity',8,2);
            $table->tinyInteger('dangerousGood');
            $table->smallInteger('sensitiveLevel');

            $table->timestamps();

            $table->foreign('deliver_idDeliver')
                  ->references('idDeliver')->on('delivers')
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
        Schema::dropIfExists('deliver_types');
    }
}
