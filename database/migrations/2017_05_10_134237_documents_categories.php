<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_categories', function (Blueprint $table) {
            $table->integer('document_id');
            $table->integer('category_id');
            $table->timestamps();
            
            $table->primary(['document_id', 'category_id']);
            $table->foreign('document_id')->references('id')->on('documents')
                    ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::drop('documents_categories');
    }
}
