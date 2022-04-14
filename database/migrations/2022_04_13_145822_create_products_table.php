<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('sku')->nullable();
            $table->integer('weight')->nullable();
            $table->text('featured')->nullable();
            $table->date('publish_date')->nullable();
            $table->integer('author_id')->nullable()->unsigned();
            $table->integer('company_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('publishing_house')->nullable();
            $table->string('translator')->nullable();
            $table->integer('quality')->nullable()->default(0);
            $table->bigInteger('price')->nullable();
            $table->bigInteger('cover_price')->nullable();
            $table->string('product_image')->nullable();
            $table->text('images')->nullable();
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
};
