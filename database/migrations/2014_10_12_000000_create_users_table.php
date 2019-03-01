<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned()->index()->nullable();
            $table->integer('city_id')->unsigned()->index()->nullable();
            $table->integer('added_by')->unsigned()->index()->nullable();
            $table->string('egn')->nullable();
            $table->string('name')->nullable();
            $table->string('fathersname')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password')->nullable();
            $table->integer('blood_type')->nullable();
            $table->string('role');
            $table->integer('active')->nullable();
            $table->string('gender')->nullable();
            $table->integer('blood_quantity')->nullable();
            $table->integer('count_blood_quantity')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
