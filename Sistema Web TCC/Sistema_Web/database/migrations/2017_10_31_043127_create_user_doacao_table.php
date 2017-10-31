<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDoacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_doacao', function (Blueprint $table) {

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->integer('doacao_id')->unsigned()->nullable();
            $table->foreign('doacao_id')->references('id')
            ->on('doacaos')->onDelete('cascade');

            $table->primary(['user_id', 'doacao_id']);

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
        Schema::dropIfExists('user_doacao');
    }
}
