<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id')->unsigned()->nullable();
            $table->integer('station_id')->unsigned()->nullable();
            $table->string('name')->unique();
            $table->integer('min_unit_price')->nullable();
            $table->integer('max_unit_price');
            $table->integer('min_operation_time')->nullable();
            $table->integer('max_operation_time');
            $table->text('description');
            $table->text('required_condition')->nullable();
            $table->text('better_condition')->nullable();
            $table->time('work_start')->nullable();
            $table->time('work_end')->nullable();
            $table->integer('weekly_attendance')->nullable();
            $table->text('feature')->nullable();
            $table->tinyInteger('decided')->default(0);
            $table->timestamps();

            $table->foreign('agent_id')
                  ->references('id')
                  ->on('agents')
                  ->onDelete('set null');
            $table->foreign('station_id')
                  ->references('id')
                  ->on('stations')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
