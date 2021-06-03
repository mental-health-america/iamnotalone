<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('category');
            $table->string('banner')->nullable();
            $table->text('description');
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->string('venue')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('link')->nullable();
            $table->string('platform')->nullable();
            $table->boolean('online')->default(0);
            $table->boolean('inperson')->default(0);
            $table->boolean('recur')->default(0);
            $table->boolean('accomodation')->default(0);
            $table->boolean('peers')->default(0);
            $table->boolean('training')->default(0);
            $table->string('frequency')->nullable();
            $table->boolean('approved')->default(0);
            $table->boolean('deleted')->default(0);
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
        Schema::dropIfExists('events');
    }
}
