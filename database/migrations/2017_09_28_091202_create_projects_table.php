<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->integer('publish_id')->unsigned()->nullable();
            $table->timestamp('publish_at')->nullable();

            $table  ->foreign('publish_id')
                        ->references('id')
                        ->on('publishes')
                        ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('language_project', function (Blueprint $table) {
            $table->integer('language_id')->unsigned();
            $table->integer('project_id')->unsigned();

            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();

            $table->primary(['language_id', 'project_id']);

            $table  ->foreign('language_id')
                    ->references('id')
                    ->on('languages')
                    ->onDelete('RESTRICT');

            $table  ->foreign('project_id')
                    ->references('id')
                    ->on('projects')
                    ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('photo_project', function (Blueprint $table) {
            $table->integer('photo_id')->unsigned();
            $table->integer('project_id')->unsigned();

            $table->string('use')->default('thumbnail');
            $table->unsignedInteger('order')->nullable();
            $table->string('class')->nullable();

            $table->unique(['use', 'order', 'project_id']);
            $table->unique(['photo_id', 'use', 'project_id']);

            $table  ->foreign('photo_id')
                    ->references('id')
                    ->on('photos')
                    ->onDelete('RESTRICT');

            $table  ->foreign('project_id')
                    ->references('id')
                    ->on('projects')
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
        Schema::dropIfExists('photo_project');
        Schema::dropIfExists('language_project');
        Schema::dropIfExists('projects');
    }
}
