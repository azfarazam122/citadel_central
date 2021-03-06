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

        DB::unprepared("INSERT INTO `master_admins` (`id`, `user_id`, `name`) VALUES
            (1, 10, 'Tristan.kirk');
        ");
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