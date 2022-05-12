<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('province');
            $table->string('relevance');
        });

         DB::table('clients')->insert(
            array(
                'user_id' => 101,
                'first_name' => 'usman',
                'last_name' => 'ghani',
                'province' => 'Sindh',
                'relevance' => 'Karachi',
            )
        );
         DB::table('clients')->insert(
            array(
                'user_id' => 102,
                'first_name' => 'Muhammad',
                'last_name' => 'Hamza',
                'province' => 'Sindh',
                'relevance' => 'Karachi',
            )
        );
         DB::table('clients')->insert(
            array(
                'user_id' => 103,
                'first_name' => 'Ali',
                'last_name' => 'Fawad',
                'province' => 'Sindh',
                'relevance' => 'Karachi',
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}