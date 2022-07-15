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
            (1, 'LearnHowToCollectYourMilesToday_Btn', 'asdasdadasdadsdad asdasdasd','Button', 0);
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