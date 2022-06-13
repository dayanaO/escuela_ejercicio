<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('names', 150);
            $table->string('lastnames', 200);
            $table->date('birthday');
            $table->string('address', 255);
            $table->string('email, 255')->uniqued();
            $table->integer('phone');
            $table->integer('city_id', false,true)->unsigned()->index;
            
            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('status');
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
        Schema::dropIfExists('students');
    }
};
