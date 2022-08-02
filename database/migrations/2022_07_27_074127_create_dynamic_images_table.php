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
            (33, NULL, 'img33.jpeg', 1),
            (34, NULL, 'img34.png', 1),
            (35, NULL, 'img35.png', 1),
            (36, NULL, 'img36.png', 1),
            (37, NULL, 'img37.png', 1),
            (38, NULL, 'img38.png', 1),
            (39, NULL, 'img39.png', 1),
            (40, NULL, 'img40.png', 1),
            (41, NULL, 'img41.png', 1),
            (42, NULL, 'img42.png', 1),
            (43, NULL, 'img43.png', 1),
            (44, NULL, 'img44.png', 1),
            (45, NULL, 'img45.png', 1),
            (46, NULL, 'img46.png', 1),
            (47, NULL, 'img47.png', 1),
            (48, NULL, 'img48.png', 1),
            (49, NULL, 'img49.png', 1),
            (50, NULL, 'img50.png', 1),
            (51, NULL, 'img51.png', 1),
            (52, NULL, 'img52.png', 1),
            (53, NULL, 'img53.gif', 1),
            (54, NULL, 'img54.png', 1),
            (55, NULL, 'img55.png', 1),
            (56, NULL, 'img56.png', 1),
            (57, NULL, 'img57.png', 1),
            (58, NULL, 'img58.png', 1),
            (59, NULL, 'img59.png', 1),
            (60, NULL, 'img60.png', 1),
            (61, NULL, 'img61.png', 1),
            (62, NULL, 'img62.png', 1),
            (63, NULL, 'img63.png', 1),
            (64, NULL, 'img64.png', 1),
            (65, NULL, 'img65.png', 1),
            (66, NULL, 'img66.png', 1),
            (67, NULL, 'img67.png', 1),
            (68, NULL, 'img68.png', 1),
            (69, NULL, 'img69.png', 1),
            (70, NULL, 'img70.png', 1),
            (71, NULL, 'img71.png', 1),
            (72, NULL, 'img72.png', 1),
            (73, NULL, 'img73.png', 1),
            (74, NULL, 'img74.png', 1),
            (75, NULL, 'img75.png', 1),
            (76, NULL, 'img76.png', 1),
            (77, NULL, 'img77.png', 1),
            (78, NULL, 'img78.png', 1),
            (79, NULL, 'img79.png', 1),
            (80, NULL, 'img80.png', 1),
            (81, NULL, 'img81.png', 1),
            (82, NULL, 'img82.png', 1),
            (83, NULL, 'img83.png', 1),
            (84, NULL, 'img84.png', 1),
            (85, NULL, 'img85.png', 1),
            (86, NULL, 'img86.png', 1),
            (87, NULL, 'img87.png', 1);
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