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
            $table->string('company_name');
            $table->string('broker_house');
            $table->string('license_no');
            $table->string('phone');
            $table->string('facebook_link');
            $table->string('linkedin_link');
            $table->string('instagram_link');
            $table->string('twitter_link');
            $table->string('profile_pic');
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
            $table->string('agent_type');
            $table->string('is_approved');
        });


        DB::unprepared("INSERT INTO `agents` (`id`, `user_id`, `admin_id`, `full_name`, `company_name`, `broker_house`, `license_no`, `phone`, `facebook_link`, `linkedin_link`, `instagram_link`, `twitter_link`, `profile_pic`, `apply_now_link`, `how_to_collect_your_miles_today_link`, `your_financial_journey_link`, `mortgage_prequalification_link`, `your_home_journey_link`, `your_mortgage_calculators_link`, `calculate_how_you_can_be_mortgagefreesooner_link`, `get_prequalified_now_link`, `bio_apply_now_link`, `about_us_apply_now_link`, `agent_type`, `is_approved`) VALUES
            (1, 1, 4, 'Hamza Developer', '', '12341123', '#11233434111', '+922342344', 'https://www.facebook.com/Hamza/', 'https://www.linkedin.com/Hamza/', 'https://www.instagram.com/Hamza/', 'https://www.twitter.com/Hamza/', 'hamza.jpg', 'https://www.google.com/', 'https://citadelmortgages.ca/air-miles/', 'https://yfj.wealthdesk.com.au/my/home', 'https://mortgage-prequalification.ca/', 'https://yourhomejourney.ca/', 'https://yourmortgagecalculators.ca/calculators/', 'https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php', 'https://mortgage-prequalification.ca/', 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276', 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276', 'mortgage_professional', 'true'),
            (2, 2, 4, 'Usman Designer', '', '12312313', '#11235454', '+9221232344', 'https://www.facebook.com/Usman/', 'https://www.linkedin.com/Usman/', 'https://www.instagram.com/Usman/', 'https://www.twitter.com/Usman/', 'usman.jpg', 'https://www.google.com/', 'https://citadelmortgages.ca/air-miles/', 'https://yfj.wealthdesk.com.au/my/home', 'https://mortgage-prequalification.ca/', 'https://yourhomejourney.ca/', 'https://yourmortgagecalculators.ca/calculators/', 'https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php', 'https://mortgage-prequalification.ca/', 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276', 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276', 'mortgage_professional', 'true'),
            (3, 4, 1, 'Ali', '', '23424', '#11442434', '+922567844', 'https://www.facebook.com/Ali/', 'https://www.linkedin.com/Ali/', 'https://www.instagram.com/Ali/', 'https://www.twitter.com/Ali/', 'Ali.png', 'https://www.google.com/', 'https://citadelmortgages.ca/air-miles/', 'https://yfj.wealthdesk.com.au/my/home', 'https://mortgage-prequalification.ca/', 'https://yourhomejourney.ca/', 'https://yourmortgagecalculators.ca/calculators/', 'https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php', 'https://mortgage-prequalification.ca/', 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276', 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276', 'mortgage_professional', 'false'),
            (6, 10, 8, 'Tristan.krik', '', '1231233', '#2131243', '+92256784421', 'https://www.facebook.com/Tristan/', 'https://www.linkedin.com/Tristan/', 'https://www.instagram.com/Tristan/', 'https://www.twitter.com/Tristan/', 'Tristan.png', 'https://www.google.com/', 'https://citadelmortgages.ca/air-miles/', 'https://yfj.wealthdesk.com.au/my/home', 'https://mortgage-prequalification.ca/', 'https://yourhomejourney.ca/', 'https://yourmortgagecalculators.ca/calculators/', 'https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php', 'https://mortgage-prequalification.ca/', 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276', 'https://citadel-mortgages.mtg-app.com/signup?brokerName=kristin.kiviranta&brokerId=2cb674c2-2d2d-4640-a9ff-578c5b58e276', 'mortgage_professional', 'true'),
            (26, 74, 4, 'farhan jameel', 'Citadel Mortgages Tristan', '1231423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'real_state_agent', 'false');
        ");
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