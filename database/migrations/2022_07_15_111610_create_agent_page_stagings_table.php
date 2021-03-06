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
            $table->longText('data');
            $table->boolean('is_approved')->default(false);
            $table->text('reason_for_disapproval');
            $table->boolean('is_submitted_for_approval')->default(false);
            $table->timestamps();
        });

        DB::unprepared("INSERT INTO `agent_page_stagings` (`id`, `page_id`, `agent_id`, `data`, `is_approved`, `reason_for_disapproval`, `is_submitted_for_approval`, `created_at`, `updated_at`) VALUES
        (1, 1, 1, 'Hello Home Page', 0, 'Don\'t Like The Design. Try to Improvise the Design in a Better Way.', 0, NULL, '2022-07-19 06:17:14'),
        (2, 2, 1, 'Hello About Page', 0, 'Don\'t like the Design', 0, NULL, '2022-07-14 23:53:44'),
        (3, 3, 1, 'Hello Rates Page', 0, 'Don\'t Like The Styling Of Your Page', 0, NULL, '2022-07-15 00:22:01');


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