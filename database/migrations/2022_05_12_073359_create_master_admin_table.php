<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_admin', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name');
        });

         DB::table('super_admin')->insert(
            array(
                'user_id' => 2001,
                'name' => 'Master_Kristinkiviranta',
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
        Schema::dropIfExists('master_admin');
    }
}