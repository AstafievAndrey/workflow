<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->comment('Ид родителя');
            $table->string('name')->comment('Название категории');
            $table->longText('description')->nullable()->comment('Описание категории');
            $table->timestamps();
        });
        
        DB::table('categories')->insert(
            array(
                'name' => 'Заявления',
                'description' => 'Примеры заявлений на отпуска, отгулы и прочее'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
