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
        Schema::create('users', function(Blueprint $table){

            $table->id();
            $table->string('names', 150);
            $table->string('lastnames', 200);
            $table->string('username', 200)->uniqued();
            $table->boolean('is_admin')->default(false);
            $table->string('email, 255')->uniqued();
            $table->string('password');                    
            $table->tinyInteger('status', false, 3)->default(1);
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
        Schema::dropIfExists('users');
    }
};
