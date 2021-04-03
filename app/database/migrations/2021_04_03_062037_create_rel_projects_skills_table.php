<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelProjectsSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_projects_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('skill_id')->unsigned();
            $table->timestamps();
            //外部キーの設定
            $table->foreign('project_id')
                        ->references('id')
                        ->on('projects');
            $table->foreign('skill_id')
                        ->references('id')
                        ->on('skills');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_projects_skills');
    }
}
