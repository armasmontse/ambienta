<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('press', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('content_type', 100)->nullable();


            $table->integer('publish_id')->unsigned()->nullable();
            $table->timestamp('publish_at')->nullable();

            $table  ->foreign('publish_id')
                        ->references('id')
                        ->on('publishes')
                        ->onDelete('RESTRICT');

            $table->timestamps();
        });

        Schema::create('photo_press', function (Blueprint $table) {
            $table->integer('photo_id')->unsigned();
            $table->integer('press_id')->unsigned();

            $table->string('use')->default('thumbnail');
            $table->unsignedInteger('order')->nullable();
            $table->string('class')->nullable();

            $table->unique(['use', 'order', 'press_id']);
            $table->unique(['photo_id', 'use', 'press_id']);

            $table  ->foreign('photo_id')
                    ->references('id')
                    ->on('photos')
                    ->onDelete('RESTRICT');

            $table  ->foreign('press_id')
                    ->references('id')
                    ->on('press')
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
        Schema::dropIfExists('press_photo');
        Schema::dropIfExists('press');
    }
}
