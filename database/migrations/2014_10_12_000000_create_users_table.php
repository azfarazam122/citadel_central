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
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->boolean('email_verified')->nullable();
            $table->boolean('is_archived')->nullable();

            // $table->id();
            // $table->string('firstName');
            // $table->string('lastName');
            // $table->string('province');
            // $table->string('name_of_brokerage')->nullable();
            // $table->string('user_type')->nullable();
            // $table->string('company_name')->nullable();
            // $table->string('broker_house')->nullable();
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->timestamps();
            // $table->boolean('email_verified')->nullable();
            // $table->boolean('is_archived')->nullable();
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