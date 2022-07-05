<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('province');
            $table->string('relevance');
            $table->timestamps();
        });

        DB::unprepared("INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `province`, `relevance`, `created_at`, `updated_at`) VALUES
            (7, 5, 'rizwan', 'ahmed', 'Ontario', '1', '2022-05-18 01:14:17', '2022-05-18 01:14:17');
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}