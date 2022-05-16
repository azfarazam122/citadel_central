<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_admins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name');
        });

         DB::table('master_admins')->insert(
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
        Schema::dropIfExists('master_admins');
    }
}