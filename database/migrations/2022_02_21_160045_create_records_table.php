<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('medicine')->nullable();
            $table->string('radiology_image')->nullable();
            $table->string('height');
            $table->string('weight');
            $table->string('blood_type');
            $table->string('lab_results')->nullable();;
            $table->string('allergies')->nullable();;
            $table->string('chronic_diseases')->nullable();;
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
        Schema::dropIfExists('records');
    }
}
