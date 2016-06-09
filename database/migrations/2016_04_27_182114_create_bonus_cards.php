<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('series', 3);
            $table->unsignedInteger('number');
            $table->boolean('status');
            $table->timestamps();
            $table->timestamp('expired_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bonus_cards');
    }
}
