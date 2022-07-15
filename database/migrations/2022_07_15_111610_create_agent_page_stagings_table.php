<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentPageStagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_page_stagings', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id');
            $table->integer('agent_id');
            $table->text('data');
            $table->boolean('is_approved')->default(false);
            $table->text('reason_for_disapproval');
            $table->boolean('is_submitted_for_approval')->default(false);
            $table->timestamps();
        });

        DB::unprepared("INSERT INTO `agent_page_stagings` (`id`, `page_id`, `agent_id`, `data`, `is_approved`, `reason_for_disapproval`, `is_submitted_for_approval`, `created_at`, `updated_at`) VALUES
            (1, 1, 1, '<div class=\"allContent\">\n        <section class=\"m-5\">\n            <img width=\"100%\" src=\"../../images/homeImages/img1.png\" alt=\"\" srcset=\"\">\n        </section>\n\n        <section class=\"container text-center\">\n            <div class=\"row text-center\">\n                <div class=\"col-md-6 mt-5 secondaryTextColor\">\n                    <div class=\"col-md-8\">\n                        <h1 class=\"mt-5\">GET APPROVED &amp; REWARDED TODAY!</h1>\n                        <h3 class=\"mt-3\">Now Offering AIR MILES<sup>@</sup> Reward Miles </h3>\n                        <p class=\"text-center mt-5 tertiaryTextColor\">Citadel Mortgages now Offers AIR\n                            MILES®\n                            Reward Miles. Get up to 1,000 MILES on\n                            every mortgage!&nbsp;</p><p class=\"text-center mt-5 tertiaryTextColor\"><span style=\"text-align: start; color: var(--secondary-text-color) ; font-family: var(--bs-font-sans-serif); font-size: 1rem;\">[[LearnHowToCollectYourMilesToday_Btn]]</span></p>\n                    </div>\n                </div>\n                <div class=\"col-md-6\"><img width=\"100%\" src=\"../../images/homeImages/img2.png\" alt=\"\" srcset=\"\">\n                </div>\n            </div>\n        </section>\n\n        <section class=\"container\">\n            <hr>\n            <div class=\"row\">\n                <div class=\"col-md-4 text-center\"><br></div></div></section>\n    </div>', 0, 'Don\'t Like The Design. Try to Improvise the Design in a Better Way.', 0, NULL, '2022-07-15 05:33:29'),
            (2, 2, 1, 'Hello About Page', 0, 'Don\'t like the Design', 0, NULL, '2022-07-15 04:53:44'),
            (3, 3, 1, 'Hello Rates Page', 0, 'Don\'t Like The Styling Of Your Page', 0, NULL, '2022-07-15 05:22:01');
         ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_page_stagings');
    }
}