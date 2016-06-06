<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar');
            $table->date('birth_date');
            $table->enum('gender',[
                                    'male'=>'male',
                                    'female'=>'female',
                                   ]
                        );
            $table->string('email')->unique();
            $table->enum('role',[
                                  'admin' => 'admin',
                                  'user' => 'user',
                                ]
                        )->default('user');
            $table->enum('status',[
                                  'active' => 'active',
                                  'bloked' => 'bloked',
                                ]
                        )->default('active');
            $table->string('password');
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
        Schema::drop('users');
    }
}
