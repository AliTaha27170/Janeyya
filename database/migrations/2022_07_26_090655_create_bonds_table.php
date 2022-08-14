<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonds', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
             //0 سند صرف 
            //1 سند قبض 

            $table->string("name_of_user")->nullable();
            $table->string("fund_name")->nullable();


            $table->string("amount")->nullable();

            $table->text("details")->nullable();
            $table->bigInteger("company_id")->unsigned();
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("fund_id")->unsigned();
            $table->string("role")->nullable();
            $table->foreign("company_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("fund_id")->references("id")->on("funds")->onDelete('cascade');
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
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
        Schema::dropIfExists('bonds');
    }
}
