<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_images', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id')->nullable();
            $table->string('file_name');
            $table->boolean('is_common')->default(false);
        });

         DB::unprepared("INSERT INTO `dynamic_images` (`id`, `agent_id`, `file_name`, `is_common`) VALUES
            (2, NULL, 'img1.png', 1),
            (3, NULL, 'img2.png', 1),
            (4, NULL, 'img3.png', 1),
            (5, NULL, 'img4.png', 1),
            (6, NULL, 'img5.png', 1),
            (7, NULL, 'img6.png', 1),
            (8, NULL, 'img7.png', 1),
            (9, NULL, 'img8.png', 1);
         ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dynamic_images');
    }
}