<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->nullable(false);;
            $table->string('forename', 150)->nullable(false);;
            $table->string('gender', 10)->nullable(false);
            $table->boolean('active');
            $table->date('active_from');
            $table->date('active_to');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
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
        Schema::dropIfExists('test_people');
    }
}
