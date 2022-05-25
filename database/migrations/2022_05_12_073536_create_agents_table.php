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
            $table->string('how_to_collect_your_miles_today_link');
            $table->string('your_financial_journey_link');
            $table->string('mortgage_prequalification_link');
            $table->string('your_home_journey_link');
            $table->string('your_mortgage_calculators_link');
            $table->string('calculate_how_you_can_be_mortgagefreesooner_link');
            $table->string('get_prequalified_now_link');
            $table->string('bio_apply_now_link');
            $table->string('apply_now_link');
            $table->string('about_us_apply_now_link');
        });

        DB::table('agents')->insert(
            array(
               'user_id' => 1,
                'admin_id' => 4,
                'full_name' => 'Hamza Developer',
                'license_no' => '#11233434',
                'phone' => '+922342344',
                'facebook_link' => 'https://www.facebook.com/Ahmed/',
                'linkedin_link' => 'https://www.linkedin.com/Ahmed/',
                'instagram_link' => 'https://www.instagram.com/Ahmed/',
                'twitter_link' => 'https://www.twitter.com/Ahmed/',
                'profile_pic' => '/images/profile_pic/ahmed.png',
                'apply_now_link' => 'www.google.com',
                'how_to_collect_your_miles_today_link' => 'https://citadelmortgages.ca/air-miles/',
                'your_financial_journey_link' => 'https://yfj.wealthdesk.com.au/my/home',
                'mortgage_prequalification_link' => 'https://mortgage-prequalification.ca/',
                'your_home_journey_link' => 'https://yourhomejourney.ca/',
                'your_mortgage_calculators_link' => 'https://yourmortgagecalculators.ca/calculators/',
                'calculate_how_you_can_be_mortgagefreesooner_link' => 'https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php',
                'get_prequalified_now_link' => 'https://mortgage-prequalification.ca/',
                'bio_apply_now_link' => 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276',
                'about_us_apply_now_link' => 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276',
            )
        );

        DB::table('agents')->insert(
            array(
                'user_id' => 2,
                'admin_id' => 4,
                'full_name' => 'Usman Ghani',
                'license_no' => '#11233434',
                'phone' => '+922342344',
                'facebook_link' => 'https://www.facebook.com/Arif/',
                'linkedin_link' => 'https://www.linkedin.com/Arif/',
                'instagram_link' => 'https://www.instagram.com/Arif/',
                'twitter_link' => 'https://www.twitter.com/Arif/',
                'profile_pic' => '/images/profile_pic/Arif.png',
                'apply_now_link' => 'www.google.com',
                'how_to_collect_your_miles_today_link' => 'https://citadelmortgages.ca/air-miles/',
                'your_financial_journey_link' => 'https://yfj.wealthdesk.com.au/my/home',
                'mortgage_prequalification_link' => 'https://mortgage-prequalification.ca/',
                'your_home_journey_link' => 'https://yourhomejourney.ca/',
                'your_mortgage_calculators_link' => 'https://yourmortgagecalculators.ca/calculators/',
                'calculate_how_you_can_be_mortgagefreesooner_link' => 'https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php',
                'get_prequalified_now_link' => 'https://mortgage-prequalification.ca/',
                'bio_apply_now_link' => 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276',
                'about_us_apply_now_link' => 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276',
            )
        );
           DB::table('agents')->insert(
            array(
                'user_id' => 4,
                'admin_id' => 1,
                'full_name' => 'Ali Developer',
                'license_no' => '#11442434',
                'phone' => '+922342344',
                'facebook_link' => 'https://www.facebook.com/Basit/',
                'linkedin_link' => 'https://www.linkedin.com/Basit/',
                'instagram_link' => 'https://www.instagram.com/Basit/',
                'twitter_link' => 'https://www.twitter.com/Basit/',
                'profile_pic' => '/images/profile_pic/Basit.png',
                'apply_now_link' => 'www.google.com',
                'how_to_collect_your_miles_today_link' => 'https://citadelmortgages.ca/air-miles/',
                'your_financial_journey_link' => 'https://yfj.wealthdesk.com.au/my/home',
                'mortgage_prequalification_link' => 'https://mortgage-prequalification.ca/',
                'your_home_journey_link' => 'https://yourhomejourney.ca/',
                'your_mortgage_calculators_link' => 'https://yourmortgagecalculators.ca/calculators/',
                'calculate_how_you_can_be_mortgagefreesooner_link' => 'https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php',
                'get_prequalified_now_link' => 'https://mortgage-prequalification.ca/',
                'bio_apply_now_link' => 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276',
                'about_us_apply_now_link' => 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276',
            )
        );
           DB::table('agents')->insert(
            array(
               'user_id' => 10,
                'admin_id' => 1,
                'full_name' => 'Tristan.krik',
                'license_no' => '#11233434',
                'phone' => '+922342344',
                'facebook_link' => 'https://www.facebook.com/Tristan/',
                'linkedin_link' => 'https://www.linkedin.com/Tristan/',
                'instagram_link' => 'https://www.instagram.com/Tristan/',
                'twitter_link' => 'https://www.twitter.com/Tristan/',
                'profile_pic' => '/images/profile_pic/Tristan.png',
                'apply_now_link' => 'www.google.com',
                'how_to_collect_your_miles_today_link' => 'https://citadelmortgages.ca/air-miles/',
                'your_financial_journey_link' => 'https://yfj.wealthdesk.com.au/my/home',
                'mortgage_prequalification_link' => 'https://mortgage-prequalification.ca/',
                'your_home_journey_link' => 'https://yourhomejourney.ca/',
                'your_mortgage_calculators_link' => 'https://yourmortgagecalculators.ca/calculators/',
                'calculate_how_you_can_be_mortgagefreesooner_link' => 'https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php',
                'get_prequalified_now_link' => 'https://mortgage-prequalification.ca/',
                'bio_apply_now_link' => 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276',
                'about_us_apply_now_link' => 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276',
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