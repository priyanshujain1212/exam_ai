<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMockTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   // database/migrations/xxxx_xx_xx_create_mock_tests_table.php
public function up()
{
    Schema::create('mock_tests', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('questions');
        $table->string('exam');  // The related exam
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
        Schema::dropIfExists('mock_tests');
    }
}
