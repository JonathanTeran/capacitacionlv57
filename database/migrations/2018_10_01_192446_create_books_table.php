<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->string('description',1000);
            $table->string('vpath',100); 
            $table->string('slug',150)->nullable();
            $table->double('price',8,2);
            $table->integer('category_id')->unsigned(); 
            $table->integer('user_id')->unsigned(); 
            $table->softDeletes();
            $table->timestamps();
            $table->integer('created_user');
            $table->integer('updated_user');
        
            $table->foreign('category_id')->references('id')->on('categories'); 
            $table->foreign('user_id')
            ->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
