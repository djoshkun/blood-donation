<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorDeklarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_deklarations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donor_id')->unsigned()->index();
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('declaration_id')->unsigned()->index();
            $table->foreign('declaration_id')->references('id')->on('declarations')->onDelete('cascade');
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
        Schema::dropIfExists('donor_deklarations');
    }
}
