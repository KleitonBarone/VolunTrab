<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avalia_user', function (Blueprint $table) {

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->integer('avalia_id')->unsigned()->nullable();
            $table->foreign('avalia_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->integer('nota')->nullable();

            $table->string('comentario')->nullable();

            $table->primary(['user_id', 'avalia_id']);

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avalia_user');
    }
}
