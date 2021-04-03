<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelPositionsProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_positions_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->timestamps();
            //外部キーの設定
            $table->foreign('position_id')
                        ->references('id')
                        ->on('positions');
            $table->foreign('project_id')
                        ->references('id')
                        ->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_positions_projects');
    }
}
