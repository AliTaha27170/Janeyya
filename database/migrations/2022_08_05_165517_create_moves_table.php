<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves', function (Blueprint $table) {
            $table->id();
            $table->string("from_him")->nullable();
            $table->string("for_him")->nullable();
            $table->string("pay_him")->nullable();
            $table->string("tack_from_him")->nullable();

            $table->string("user_name")->nullable();
            $table->text("details")->nullable();


            $table->bigInteger("company_id")->unsigned();
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("fund_id")->unsigned()->nullable();
            
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
        Schema::dropIfExists('moves');
    }
}
