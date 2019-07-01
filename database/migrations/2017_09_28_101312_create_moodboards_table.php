<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoodboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('moodboards', function (Blueprint $table) {
            $table->increments('id');

            $table->text('content')->nullable();

            $table->integer('publish_id')->unsigned()->nullable();
            $table->timestamp('publish_at')->nullable();

            $table  ->foreign('publish_id')
                        ->references('id')
                        ->on('publishes')
                        ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('language_moodboard', function (Blueprint $table) {
            $table->integer('language_id')->unsigned();
            $table->integer('moodboard_id')->unsigned();

            $table->string('title')->nullable();
			$table->string('slug')->nullable()->unique();
            $table->string('description')->nullable();

            $table->primary(['language_id', 'moodboard_id']);

            $table  ->foreign('language_id')
                    ->references('id')
                    ->on('languages')
                    ->onDelete('RESTRICT');

            $table  ->foreign('moodboard_id')
                    ->references('id')
                    ->on('moodboards')
                    ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('moodboard_photo', function (Blueprint $table) {
            $table->integer('photo_id')->unsigned();
            $table->integer('moodboard_id')->unsigned();

            $table->string('use')->default('thumbnail');
            $table->unsignedInteger('order')->nullable();
            $table->string('class')->nullable();

            $table->unique(['use', 'order', 'moodboard_id']);
            $table->unique(['photo_id', 'use', 'moodboard_id']);

            $table  ->foreign('photo_id')
                    ->references('id')
                    ->on('photos')
                    ->onDelete('RESTRICT');

            $table  ->foreign('moodboard_id')
                    ->references('id')
                    ->on('moodboards')
                    ->onDelete('RESTRICT');

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
        //
        Schema::dropIfExists('language_moodboard');
        Schema::dropIfExists('moodboard_photo');
        Schema::dropIfExists('moodboards');
    }
}
