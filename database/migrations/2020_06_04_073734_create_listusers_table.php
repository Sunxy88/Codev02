<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listUsers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("demand_id");
            $table->string("users");
            $table->foreign("demand_id")->references("id")->on("demands");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listusers');
    }
}
