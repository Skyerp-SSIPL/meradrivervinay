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
        // Schema::create('feed_back_videos', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('category');
        //     $table->string('video_url');
        //     $table->string('meta_tag');
        //     $table->string('meta_description');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feed_back_videos');
    }
};
