<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('data');
            $table->string('type');
            $table->boolean('submitted_for_approval')->default(false);
        });

         DB::unprepared("INSERT INTO `widgets` (`id`, `name`, `data`, `type`, `submitted_for_approval`) VALUES
(1, '[[How_to_Collect_Your_Miles_Today]]', '<a href={{ \$agentData[0]->how_to_collect_your_miles_today_link }} target=\"_blank\"\n                                rel=\"noopener noreferrer\">\n                                <button type=\"button\" class=\"btn homeButtons\">\n                                    Learn How To Collect Your Miles Today\n                                </button>\n                            </a>', 'Button', 0),
(2, '[[Your_Financial_Journey_Link]]', '<a href={{ \$agentData[0]->your_financial_journey_link }} target=\"_blank\" rel=\"noopener noreferrer\">\n                        <img width=\"300px\" src=\"../../images/homeImages/img3.png\" alt=\"\">\n                    </a>', 'Image', 0),
(3, '[[Mortgage_Prequalification_Link]]', '<a href={{ \$agentData[0]->mortgage_prequalification_link }} target=\"_blank\"\n                        rel=\"noopener noreferrer\">\n                        <img width=\"300px\" src=\"../../images/homeImages/img4.jpeg\" alt=\"\">\n                    </a>', 'Image', 0),
(4, '[[Your_Home_Journey_Link]]', '<a href={{ \$agentData[0]->your_home_journey_link }} target=\"_blank\" rel=\"noopener noreferrer\">\n                            <img width=\"300px\" src=\"../../images/homeImages/img5.jpeg\" alt=\"\">\n                        </a>', 'Image', 0),
(5, '[[Your_Mortgage_Calculators_Link]]', '<a href={{ \$agentData[0]->your_mortgage_calculators_link }} target=\"_blank\"\n                            rel=\"noopener noreferrer\">\n                            <img width=\"300px\" src=\"../../images/homeImages/img6.png\" alt=\"\">\n                        </a>', 'Image', 0),
(6, '[[Get_Prequalified_Now_Link]]', '<a href={{ \$agentData[0]->get_prequalified_now_link }} target=\"_blank\" rel=\"noopener noreferrer\">\n                    <button type=\"button\" class=\"btn homeButtons m-3 btn-light border-2\">\n                        Get Pre Qualified Now\n                    </button>\n                </a>', 'Button', 0),
(7, '[[Calculate_How_You_Can_Be_MortgageFreeSooner_Link]]', '<a href={{ \$agentData[0]->calculate_how_you_can_be_mortgagefreesooner_link }} target=\"_blank\"\n                            rel=\"noopener noreferrer\">\n                            <button type=\"button\" class=\"btn homeButtons m-3\">\n                                Calculate How You Can Be Mortgage-Free Sooner!\n                            </button>\n                        </a>', 'Button', 0),
(8, '[[About_Page_Bio_Link]]', 'asdasdadasdadsdad asdasdasd', 'Button', 0),
(9, '[[About_Page_Last_Apply_Now_Link]]', 'asdasdadasdadsdad asdasdasd', 'Button', 0);
         ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
