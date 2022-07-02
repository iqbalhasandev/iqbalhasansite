<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEightSemesterResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eight_semester_results', function (Blueprint $table) {
            $table->id();
            $table->integer('roll');
            $table->float('point')->nullable();
            $table->string('grade')->default('F');
            $table->text('failed_subjects')->nullable();
            $table->string('session')->nullable();
            $table->string('semester')->nullable();
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
        Schema::dropIfExists('eight_semester_results');
    }
}
