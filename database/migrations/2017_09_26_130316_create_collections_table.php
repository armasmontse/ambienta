<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('publish_id')->unsigned()->nullable();
            $table->timestamp('publish_at')->nullable();
            $table->boolean('highlighted')->nullable()->default(false);

            $table  ->foreign('publish_id')
                        ->references('id')
                        ->on('publishes')
                        ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('collection_language', function (Blueprint $table) {
            $table->integer('language_id')->unsigned();
            $table->integer('collection_id')->unsigned();

            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('content')->nullable();
            $table->text('excerpt')->nullable();

            $table->primary(['language_id', 'collection_id']);

            $table  ->foreign('language_id')
                    ->references('id')
                    ->on('languages')
                    ->onDelete('RESTRICT');

            $table  ->foreign('collection_id')
                    ->references('id')
                    ->on('collections')
                    ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('collection_photo', function (Blueprint $table) {
            $table->integer('photo_id')->unsigned();
            $table->integer('collection_id')->unsigned();

            $table->string('use')->default('thumbnail');
            $table->unsignedInteger('order')->nullable();
            $table->string('class')->nullable();

            $table->unique(['use', 'order', 'collection_id']);
            $table->unique(['photo_id', 'use', 'collection_id']);

            $table  ->foreign('photo_id')
                    ->references('id')
                    ->on('photos')
                    ->onDelete('RESTRICT');

            $table  ->foreign('collection_id')
                    ->references('id')
                    ->on('collections')
                    ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('collection_type', function (Blueprint $table) {
            $table->integer('type_id')->unsigned();
            $table->integer('collection_id')->unsigned();

            $table->primary(['type_id', 'collection_id']);

            $table  ->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    ->onDelete('RESTRICT');

            $table  ->foreign('collection_id')
                    ->references('id')
                    ->on('collections')
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
        Schema::dropIfExists('collection_type');
        Schema::dropIfExists('collection_photo');
        Schema::dropIfExists('collection_language');
        Schema::dropIfExists('collections');
    }
}
