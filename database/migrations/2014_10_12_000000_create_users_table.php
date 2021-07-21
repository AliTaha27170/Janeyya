<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->default(2);
            $table->string('note_p');
                    //Help271
                   // 1 الرأس الكبير (من يضيف الشركات )        
                  // 2  إدارة شركة التسويق       
                 // 3  موظف شركة التسويق       
                // 4 الكاتب      
               // 5 الدلال        
              // 6 المزارع   
             // 7 المتعاقد    
            // 8 التاجر    
           // 271 Show all 
            $table->bigInteger('company')->unsigned()->nullable();
            $table->foreign("company")->references("id")->on("users")->onDelete('cascade');
             //"بحال كان مزارع , دلال , موظف إدخال , أو تاجر  "الشركة التابع لها 
             $table->bigInteger('farmer_id')->unsigned()->nullable();
             $table->integer('is_delete')->default(0);
             //0 لا
            // 1 تم حذفه 
            $table->string('image');
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('iban')->nullable();
            $table->integer('t3akdPrice')->nullable();
            //التاجر
            $table->string('company_name')->nullable();
            $table->string('adress')->nullable();
            $table->string('CommercialRegistrationNo')->nullable();
            //الموظف
            $table->integer('salary')->nullable();
            $table->string('DurationContract')->nullable();
            $table->longText('notes')->nullable();
            $table->rememberToken();
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
}
