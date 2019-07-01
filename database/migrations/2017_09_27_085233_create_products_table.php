<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
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

            $table->integer('publish_id')->unsigned()->nullable();
            $table->timestamp('publish_at')->nullable();
            $table->string('code',10)->unique();

            $table  ->foreign('publish_id')
                        ->references('id')
                        ->on('publishes')
                        ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('language_product', function (Blueprint $table) {
            $table->integer('language_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('description')->nullable();

            $table->primary(['language_id', 'product_id']);

            $table  ->foreign('language_id')
                    ->references('id')
                    ->on('languages')
                    ->onDelete('RESTRICT');

            $table  ->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('photo_product', function (Blueprint $table) {
            $table->integer('photo_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->string('use')->default('thumbnail');
            $table->unsignedInteger('order')->nullable();
            $table->string('class')->nullable();

            $table->unique(['use', 'order', 'product_id']);
            $table->unique(['photo_id', 'use', 'product_id']);

            $table  ->foreign('photo_id')
                    ->references('id')
                    ->on('photos')
                    ->onDelete('RESTRICT');

            $table  ->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->primary(['category_id', 'product_id']);

            $table  ->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('RESTRICT');

            $table  ->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('RESTRICT');
        });

        Schema::create('collection_product', function (Blueprint $table) {
            $table->integer('collection_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->primary(['collection_id', 'product_id']);

            $table  ->foreign('collection_id')
                    ->references('id')
                    ->on('collections')
                    ->onDelete('RESTRICT');

            $table  ->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('RESTRICT');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_product');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('photo_product');
        Schema::dropIfExists('language_product');
        Schema::dropIfExists('products');
    }
}
