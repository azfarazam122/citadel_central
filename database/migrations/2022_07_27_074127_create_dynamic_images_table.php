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
            (1, NULL, 'img1.png', 1),
            (2, NULL, 'img2.png', 1),
            (3, NULL, 'img3.png', 1),
            (4, NULL, 'img4.jpeg', 1),
            (5, NULL, 'img5.jpeg', 1),
            (6, NULL, 'img6.png', 1),
            (7, NULL, 'img7.jpeg', 1),
            (8, NULL, 'img8.png', 1),
            (9, NULL, 'img9.png', 1),
            (10, NULL, 'img10.jpeg', 1),
            (11, NULL, 'img11.png', 1),
            (12, NULL, 'img12.jpeg', 1),
            (13, NULL, 'img13.png', 1),
            (14, NULL, 'img14.jpeg', 1),
            (15, NULL, 'img15.png', 1),
            (16, NULL, 'img16.png', 1),
            (17, NULL, 'img17.png', 1),
            (18, NULL, 'img18.jpeg', 1),
            (19, NULL, 'img19.jpeg', 1),
            (20, NULL, 'img20.jpeg', 1),
            (21, NULL, 'img21.png', 1),
            (22, NULL, 'img22.png', 1),
            (23, NULL, 'img23.jpeg', 1),
            (24, NULL, 'img24.png', 1),
            (25, NULL, 'img25.png', 1),
            (26, NULL, 'img26.png', 1),
            (27, NULL, 'img27.jpeg', 1),
            (28, NULL, 'img28.jpeg', 1),
            (29, NULL, 'img29.jpeg', 1),
            (30, NULL, 'img30.jpeg', 1),
            (31, NULL, 'img31.jpeg', 1),
            (32, NULL, 'img32.jpeg', 1),
            (33, NULL, 'img33.jpeg', 1);
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