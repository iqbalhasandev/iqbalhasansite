<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBTEBResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_t_e_b_results', function (Blueprint $table) {
            $table->id();
            $table->string('session')->unique();
            $table->string('fourth_semester')->nullable();
            $table->string('fifth_semester')->nullable();
            $table->string('sixth_semester')->nullable();
            $table->string('seventh_semester')->nullable();
            $table->string('eighth_semester')->nullable();
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
        Schema::dropIfExists('b_t_e_b_results');
    }
}
