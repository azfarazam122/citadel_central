<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('primary_color');
            $table->string('secondary_color');
            $table->string('tertiary_color');
            $table->string('primary_text_color');
            $table->string('secondary_text_color');
            $table->string('tertiary_text_color');
            $table->string('fourth_text_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_settings');
    }
}
