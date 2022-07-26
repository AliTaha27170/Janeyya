<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatchReceiptProcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catch__receipt_procs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recipient_id')->comment('من قام بالقبض')->unsigned();
            $table->bigInteger('user_id')->comment('من قام بالدفع ')->unsigned();
            $table->string('the_amount');
            $table->longText('note');

            $table->bigInteger('company_id')->unsigned();
            $table->foreign("company_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("recipient_id")->references("id")->on("users");
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
        Schema::dropIfExists('catch__receipt_procs');
    }
}
