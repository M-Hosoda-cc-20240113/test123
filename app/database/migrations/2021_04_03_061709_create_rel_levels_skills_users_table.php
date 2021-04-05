<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelLevelsSkillsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_levels_skills_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('skill_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->timestamps();

            //外部キーの設定
            $table->foreign('user_id')
							->references('id')
                            ->on('users')
                            ->onDelete('cascade');
            $table->foreign('skill_id')
							->references('id')
                            ->on('skills')
                            ->onDelete('cascade');
            $table->foreign('level_id')
							->references('id')
                            ->on('levels')
                            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_levels_skills_users');
    }
}
