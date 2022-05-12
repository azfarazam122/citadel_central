<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('master_admin_id');
            $table->string('name');
        });

        DB::table('admin')->insert(
            array(
                'user_id' => 201,
                'master_admin_id' => 2101,
                'name' => 'zain',
            )
        );
        DB::table('admin')->insert(
            array(
                'user_id' => 202,
                'master_admin_id' => 2102,
                'name' => 'faiq',
            )
        );
        DB::table('admin')->insert(
            array(
                'user_id' => 203,
                'master_admin_id' => 2103,
                'name' => 'noman',
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
        Schema::dropIfExists('admin');
    }
}