<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date__bills', function (Blueprint $table) {
            $table->id();
            $table->float('quantity');
            $table->float('price');
            $table->bigInteger('date_id')->unsigned()->default(0);
            $table->foreign("date_id")->references("id")->on("dates")->onDelete('cascade');
            $table->bigInteger('bill_id')->unsigned()->default(0);
            $table->foreign("bill_id")->references("id")->on("bills")->onDelete('cascade');
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
        Schema::dropIfExists('date__bills');
    }
}
