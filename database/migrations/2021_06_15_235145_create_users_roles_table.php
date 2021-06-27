<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('partId')->unsigned();
            $table->bigInteger('userId')->unsigned();
            $table->integer('read');
            $table->integer('edit');
            $table->integer('delete');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partId')->references('id')->on('check_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
