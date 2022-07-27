<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('default_data');
        });

        DB::unprepared("INSERT INTO `pages` (`id`, `name`, `default_data`) VALUES
            (1, 'Home Page', 'This is Home Page'),
            (2, 'About Page', 'This is About Page'),
            (3, 'Rates Page', 'This is Rates Page');
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}