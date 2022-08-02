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
            $table->integer('page_id');
            $table->string('name');
            $table->longText('data');
            $table->string('type');
            $table->boolean('submitted_for_approval')->default(false);
        });

         DB::unprepared("INSERT INTO `widgets` (`id`, `page_id`, `name`, `data`, `type`, `submitted_for_approval`) VALUES
            (1, 1,'[[How_to_Collect_Your_Miles_Today]]', 'asddasd', 'Button', 0),
            (2, 1,'[[Your_Financial_Journey_Link]]', 'asdasdadsd', 'Image', 0),
            (3, 1,'[[Mortgage_Prequalification_Link]]', 'asdasdadsd', 'Image', 0),
            (4, 1,'[[Your_Home_Journey_Link]]', 'asdasdadsd', 'Image', 0),
            (5, 1,'[[Your_Mortgage_Calculators_Link]]', 'asdasdadsd', 'Image', 0),
            (6, 1,'[[Get_Prequalified_Now_Link]]', 'asdasdadsd', 'Button', 0),
            (7, 1,'[[Calculate_How_You_Can_Be_MortgageFreeSooner_Link]]', 'asdasdadsd', 'Button', 0),
            (8, 2,'[[About_Page_Bio_Link]]', 'asdasdadasdadsdad asdasdasd', 'Button', 0),
            (9, 2,'[[About_Page_Last_Apply_Now_Link]]', 'asdasdadasdadsdad asdasdasd', 'Button', 0),
            (10, 2,'[[About_Page_Agent_Name_Link]]', 'asdasdadasdadsdad asdasdasd', 'Text', 0);

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