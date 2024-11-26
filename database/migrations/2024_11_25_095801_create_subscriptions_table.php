<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   // database/migrations/xxxx_xx_xx_create_subscriptions_table.php
public function up()
{
    Schema::create('subscriptions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->string('subscription_type'); // Free, Paid, etc.
        $table->date('start_date');
        $table->date('end_date');
        $table->foreign('student_id')->references('id')->on('students');
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
        Schema::dropIfExists('subscriptions');
    }
}
