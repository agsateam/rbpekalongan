<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('web_contents', function (Blueprint $table) {
            $table->id();
            $table->string('video_link')->default('https://www.youtube.com/watch?v=DWI8h5F0GHU');
            $table->string('video_desc')->nullable();
            $table->string('rb_token')->nullable();
            $table->string('gerai_token')->nullable();
            $table->string('shopee_link')->nullable();
            $table->string('tokopedia_link')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->string('instagram_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_contents');
    }
};
