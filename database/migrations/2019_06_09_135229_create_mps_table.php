<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deputy_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('erpp');
            $table->string('eppd');
            $table->unsignedInteger('political_party_id');
            $table->unsignedInteger('committee_id')->nullable();
            $table->unsignedInteger('parliament_id');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('mps');
    }
}
