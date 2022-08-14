<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->tinyInteger("type")->nullable();
            //1 الصندوق الأساسي
            //2  السعي
            //3  الغرامات
            //4  العقود


            $table->float("assets")->default(0);

            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign("company_id")->references("id")->on("users")->onDelete('cascade');

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
        Schema::dropIfExists('funds');
    }
}
