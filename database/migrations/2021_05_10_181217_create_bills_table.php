<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->float('up')->nullable()->comment('المطلوب');
            $table->float('down')->nullable()->comment('المدفوع');
            $table->bigInteger('dalal_id')->unsigned()->nullable();
            $table->bigInteger('dealer_id')->unsigned()->nullable();
            $table->bigInteger('writer_id')->unsigned()->nullable();
            $table->bigInteger('farmer_id')->unsigned()->nullable();
            $table->bigInteger('company_id')->unsigned();
            $table->integer('type')->default(1)->comment('//1 dealer        2 custmer');
            $table->integer('type_who')->default(1)->comment('//1 writer    2 company');
            $table->integer('pay_type')->comment('   
                     // 1 آجل   
                     // 2 كاش');
            $table->foreign("dalal_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("dealer_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("writer_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("farmer_id")->references("id")->on("users")->onDelete('cascade');
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
        Schema::dropIfExists('bills');
    }
}
