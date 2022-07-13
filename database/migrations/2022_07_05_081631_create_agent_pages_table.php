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
            $table->integer('page_id');
            $table->integer('agent_id');
            $table->text('data');
            $table->boolean('is_approved')->default(false);
            $table->text('reason_for_disapproval');
            $table->boolean('is_submitted_for_approval')->default(false);
            $table->timestamps();
        });

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