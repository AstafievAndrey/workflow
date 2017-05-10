<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Documents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Название документа');
            $table->longText('description')->nullable()->comment('Описание докумена');
            $table->longText('ftp')->nullable()->comment('Где хранится на ftp');
            $table->binary('data')->nullable()->comment('Сам документ');
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
        Schema::drop('documents');
    }
}
