<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('user_email');
            $table->string('rate');
            $table->string('threshhold');
            $table->string('name');
            $table->string('logo');
            $table->string('detail');
            $table->string('ratehold');
            $table->text('special_offers');
        });

        DB::unprepared("INSERT INTO `rates` (`id`, `user_email`, `rate`, `threshhold`, `name`, `logo`, `detail`, `ratehold`, `special_offers`) VALUES
            (2, 'Tristan.kirk@citadelmortgages.ca', '3.19000', '-0.20000', '3 Year Fixed', 'citadellogo.png', '(High Ratio Rate)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (20, 'test@test.com', '2.24000', '-0.20000', '5 Year Fixed', 'emeraldbusinesscardback (1).jpg', '(High Ratio Rate)', '', ''),
            (21, 'test@test.com', '2.24000', '-0.20000', '5 Year Fixed', 'emeraldbusinesscardback (1).jpg', '(High Ratio Rate)', '', ''),
            (4, 'Tristan.kirk@citadelmortgages.ca', '3.84000', '-0.20000', '10 Year Fixed', 'citadellogo.png', '(High Ratio Rate)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (5, 'Tristan.kirk@citadelmortgages.ca', '1.95000', '0.50000', '5 Year Variable', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(High Ratio Rate)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (6, 'Tristan.kirk@citadelmortgages.ca', '3.53000', '0.50000', '5 Year Fixed', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(High Ratio Rate)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (8, 'Tristan.kirk@citadelmortgages.ca', '3.99000', '0.50000', '10 Year Fixed', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Purchase up to 80% LTV)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (9, 'Tristan.kirk@citadelmortgages.ca', '2.20000', '0.50000', '5 Year Variable', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Purchase up to 80% LTV)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (10, 'Tristan.kirk@citadelmortgages.ca', '3.59000', '-0.10000', '5 Year Fixed', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Purchase up to 80% LTV)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (11, 'Tristan.kirk@citadelmortgages.ca', '2.60000', '0.50000', '5 Year Variable', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Refinance Rate)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (22, 'tristan.kirk@citadelmortgages.ca', '3.65000', '-0.20000', '5 Year Fixed', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Refinance Rate)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (23, 'tristan.kirk@citadelmortgages.ca', '2.00000', '-0.20000', '5 Year Variable', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Switch/Transfer High Ratio)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (24, 'tristan.kirk@citadelmortgages.ca', '3.56000', '-0.20000', '5 Year Fixed', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Switch/Transfer High Ratio)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (25, 'tristan.kirk@citadelmortgages.ca', '2.90000', '-0.20000', 'HELOC', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(HELOC)', '', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (26, 'tristan.kirk@citadelmortgages.ca', '3.56000', '-0.20000', '5 Year Fixed', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Switch/Transfer - Low Ratio)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (27, 'tristan.kirk@citadelmortgages.ca', '2.00000', '-0.20000', '5 Year Variable', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Switch/Transfer - Low Ratio)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (28, 'tristan.kirk@citadelmortgages.ca', '3.80000', '-0.20000', 'HELOC', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Citadel All In One Mortgage)', 'HELOC Part of mortgage', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (29, 'tristan.kirk@citadelmortgages.ca', '3.79000', '-0.20000', '5 Year Fixed', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(Citadel All In One Mortgage)', '5 Year Fixed High Ratio Mortgage Part', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (30, 'tristan.kirk@citadelmortgages.ca', '3.65000', '-0.20000', '5 Year Fixed', 'CITADEL Mortgages logo_FINAL-CMYK.png', 'Citadel 5 in 1 Mortgage', '1st Year Mortgage Rate', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>'),
            (32, 'Tristan.kirk@citadelmortgages.ca', '2.05000', '-0.20000', '3 Year Variable', 'CITADEL Mortgages logo_FINAL-CMYK.png', '(High Ratio Rate)', '90-120 days<br><div style=\"font-size:10px;margin-top:5px;\">* Some conditions apply.</div>', '<div style=\"font-size:14px;\">Receive up to 1,000 Air Miles Reward Miles</div><div style=\"font-size:14px;margin-top:5px;\"></div><div style=\"font-size:10px;margin-top:5px;\">*Some conditions apply, mortgage must close.</div>');
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}