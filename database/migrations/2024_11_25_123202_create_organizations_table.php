<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('organizations', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique(); // Organization name
        $table->unsignedBigInteger('creator_id')->nullable(); // ID of the user who created the record
        $table->string('creator_type')->nullable(); // Type of the creator (e.g., App\User)
        $table->unsignedBigInteger('editor_id')->nullable(); // ID of the user who last edited the record
        $table->string('editor_type')->nullable(); // Type of the editor (e.g., App\User)
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
        Schema::dropIfExists('organizations');
    }
}
