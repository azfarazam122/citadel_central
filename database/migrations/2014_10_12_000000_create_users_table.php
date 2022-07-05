<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->boolean('email_verified')->nullable();
            $table->boolean('is_archived')->nullable();
            $table->string('remember_token');
        });


        DB::unprepared("INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`, `email_verified`, `is_archived`, `remember_token`) VALUES
            (1, 'hamza@gmail.com', '$2y$10\$HLtE6wE4XELEa8DLuaP7E.1dBNPz.EVWkFqZ3o/9rNFTHb88RKfJa', '2022-05-16 04:43:29', '2022-06-02 00:34:53', NULL, NULL, ''),
            (2, 'usman@gmail.com', '$2y$10$4O6NwUcV7es9BF.8pNhMS.tkhFUmFcSH/X2Kso8UHGl.z3wArxUtK', '2022-05-16 04:45:49', '2022-05-16 04:45:49', NULL, NULL, ''),
            (3, 'azfar@gmail.com', '$2y$10\$dyLj6tw4Rv3Si8h3ZI0d3Ol/EyS8Aftx2dP9Vv5fgiSs93LtOMKPW', '2022-05-17 01:23:40', '2022-05-17 01:23:40', NULL, NULL, ''),
            (4, 'ali@gmail.com', '$2y$10\$S.rTQpekTkfatFwvFpMRguYo8ysh90RDQJyzcpPfT/yAGQQDsBf9C', '2022-05-18 01:13:39', '2022-05-18 01:13:39', NULL, NULL, ''),
            (5, 'rizwan@gmail.com', '$2y$10\$WZJ2vbUWBh8Zk/p1EYgove2vPv06DnqJuZ2DjOc9PId/zXkD1500q', '2022-05-18 01:14:17', '2022-05-18 01:14:17', NULL, NULL, ''),
            (6, 'ibrahim@gmail.com', '$2y$10$2E3oB1wO3g3O5sg398B6De5G6Ln8uFc2kjyiDsk2Bv1Tnu8N4EtWu', '2022-05-18 01:14:45', '2022-05-18 01:14:45', NULL, NULL, ''),
            (7, 'zain@gmail.com', '$2y$10\$EVm1Ep0o507ghjfnLtcp1engX053FIl/jvnekW0T9EkEabnj77k5e', '2022-05-18 01:15:07', '2022-05-18 01:15:07', NULL, NULL, ''),
            (13, 'usama@gmail.com', '$2y$10\$gDCW6.hRULIcso6Z3vKlPO.ZO45WTcFJyI46pPvS8NfsFIlAmYjkq', '2022-05-20 03:01:17', '2022-05-20 03:01:17', NULL, NULL, ''),
            (14, 'basit@gmail.com', '$2y$10\$I2KqPY.qKrUPQRAr5aHgQ.Im5hgCC5a2elfSpj2RqXOLVoToDkQO2', '2022-05-20 03:01:41', '2022-05-20 03:01:41', NULL, NULL, ''),
            (10, 'Tristan.kirk@citadelmortgages.ca', '$2y$10\$V3SXW2WXlueXyMUpLDQgnuLjDejrqIXo2UvMYo4B3qQlO1OuGg/6K', NULL, '2022-06-01 02:42:00', NULL, NULL, '9CRsVQ8m2Kft8SQSIs3JHjuSaH9aGG81p5ISZtOBxPTUXkoB5HcVRpoe4LQc'),
            (74, 'farhan@gmail.com', '$2y$10\$qCYqGftoH1ys.xATFPCY6O/VxtS5oBaJzmHv6ZPu80y42S/i5iJo6', '2022-07-01 05:41:09', '2022-07-01 05:41:09', NULL, NULL, NULL);
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}