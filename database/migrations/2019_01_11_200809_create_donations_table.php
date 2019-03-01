<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donor_id')->unsigned()->index();
            $table->integer('patient_id')->unsigned()->index()->nullable();
            $table->integer('donor_declaration_id')->unsigned()->index();
            $table->integer('doctor_id')->unsigned()->index()->nullable();
            $table->integer('laborant_id')->unsigned()->index()->nullable();
            $table->integer('flag')->nullable();
            $table->text('description')->nullable();
            $table->integer('syphilis')->nullable();
            $table->integer('hepatitis_c')->nullable();
            $table->integer('hepatitis_b')->nullable();
            $table->integer('hiv_spin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('donations');
    }

}
