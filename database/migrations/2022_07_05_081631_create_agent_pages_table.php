<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_id');
            $table->text('agent_id');
            $table->string('data');
            $table->timestamps();
        });

         DB::unprepared("INSERT INTO `agent_pages` (`id`, `page_id`, `agent_id`, `data`, `created_at`, `updated_at`) VALUES
            (1, '1', '1', 'qweqwee',NULL,NULL),
            (2, '2', '1', '13123131',NULL,NULL),
            (3, '3', '1', 'qwe12312312312',NULL,NULL);
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_pages');
    }
}