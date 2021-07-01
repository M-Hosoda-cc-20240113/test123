<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('email_hash')->unique();
            $table->string('password');
            $table->string('sei');
            $table->string('sei_kana');
            $table->string('mei');
            $table->string('mei_kana');
            $table->string('tel')->unique();
            $table->string('tel_hash')->unique();
            $table->string('birthday');
            $table->integer('points')->default(0);
            $table->tinyInteger('is_receive_notification_mail')->default(1);  //メンションメールを受け取るか
            $table->tinyInteger('is_working')->default(0);      //aegis経由で働いてるかどうか
            $table->tinyInteger('is_admin')->default(0);        //管理者権限
            $table->tinyInteger('is_new')->default(1);          //新規:1か既存:0か
            $table->string('remarks')->nullable();                    //備考欄
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
