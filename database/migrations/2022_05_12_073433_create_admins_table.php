<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('master_admin_id');
            $table->string('name');
            $table->string('company_name');
            $table->string('logo');
            $table->string('primary_color');
            $table->string('secondary_color');
            $table->string('tertiary_color');
            $table->string('primary_text_color');
            $table->string('secondary_text_color');
            $table->string('tertiary_text_color');
            $table->string('fourth_text_color');
        });

        DB::unprepared("INSERT INTO `admins` (`id`, `user_id`, `master_admin_id`, `name`, `company_name`, `logo`, `primary_color`, `secondary_color`, `tertiary_color`, `primary_text_color`, `secondary_text_color`, `tertiary_text_color`, `fourth_text_color`) VALUES
            (4, 7, 1, 'zain', 'Citadel Mortgages Zain', 'logo.png', '#a38533', '#000000', '#e4e4e5', '#a38533', '#000000', '#707b89', '#ffffff'),
            (6, 3, 1, 'azfar azam', 'Citadel Mortgages Azfar', 'logo.png', '#dbac28', '#000000', '#e4e4e5', '#dbac28', '#000000', '#707b89', '#ffffff'),
            (1, 13, 1, 'usama', 'Citadel Mortgages Usama', 'logo.png', '#dbac28', '#000000', '#e4e4e5', '#dbac28', '#000000', '#707b89', '#ffffff'),
            (5, 14, 1, 'basit', 'Citadel Mortgages Basit', 'logo.png', '#dbac28', '#000000', '#e4e4e5', '#dbac28', '#000000', '#707b89', '#ffffff'),
            (7, 6, 1, 'Ibrahim Anjum', 'Citadel Mortgages Ibrahim', 'logo.png', '#dbac28', '#000000', '#e4e4e5', '#dbac28', '#000000', '#707b89', '#ffffff'),
            (8, 10, 1, 'Tristan.krik', 'Citadel Mortgages Tristan', 'logo.png', '#dbac28', '#000000', '#e4e4e5', '#dbac28', '#000000', '#707b89', '#ffffff');
        ");


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}