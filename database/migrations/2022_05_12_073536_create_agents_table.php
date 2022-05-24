<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('admin_id');
            $table->string('full_name');
            $table->string('license_no');
            $table->string('phone');
            $table->string('facebook_link');
            $table->string('linkedin_link');
            $table->string('instagram_link');
            $table->string('twitter_link');
            $table->string('profile_pic');
            $table->string('apply_now_link');
        });

        DB::table('agents')->insert(
            array(
                'user_id' => 201,
                'admin_id' => 2101,
                'full_name' => 'Ahmed Tayyab',
                'license_no' => '#11233434',
                'phone' => '+922342344',
                'facebook_link' => 'https://www.facebook.com/Ahmed/',
                'linkedin_link' => 'https://www.linkedin.com/Ahmed/',
                'instagram_link' => 'https://www.instagram.com/Ahmed/',
                'twitter_link' => 'https://www.twitter.com/Ahmed/',
                'profile_pic' => '/images/profile_pic/ahmed.png',
                'apply_now_link' => 'www.google.com',
            )
        );
           DB::table('agents')->insert(
            array(
                'user_id' => 202,
                'admin_id' => 2102,
                'full_name' => 'Arif',
                'license_no' => '#11235454',
                'phone' => '+9221232344',
                'facebook_link' => 'https://www.facebook.com/Arif/',
                'linkedin_link' => 'https://www.linkedin.com/Arif/',
                'instagram_link' => 'https://www.instagram.com/Arif/',
                'twitter_link' => 'https://www.twitter.com/Arif/',
                'profile_pic' => '/images/profile_pic/Arif.png',
                'apply_now_link' => 'www.google.com',
            )
        );
           DB::table('agents')->insert(
            array(
                'user_id' => 201,
                'admin_id' => 2101,
                'full_name' => 'Basit',
                'license_no' => '#11442434',
                'phone' => '+922567844',
                'facebook_link' => 'https://www.facebook.com/Basit/',
                'linkedin_link' => 'https://www.linkedin.com/Basit/',
                'instagram_link' => 'https://www.instagram.com/Basit/',
                'twitter_link' => 'https://www.twitter.com/Basit/',
                'profile_pic' => '/images/profile_pic/Basit.png',
                'apply_now_link' => 'www.google.com',
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
        Schema::dropIfExists('agents');
    }
}