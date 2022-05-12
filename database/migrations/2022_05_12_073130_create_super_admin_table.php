<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_admin', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name');
        });

        DB::table('super_admin')->insert(
            array(
                'user_id' => 1001,
                'name' => 'kristinkiviranta',
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
        Schema::dropIfExists('super_admin');
    }
}