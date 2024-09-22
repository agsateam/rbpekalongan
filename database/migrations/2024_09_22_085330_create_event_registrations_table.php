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
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->string('name');
            $table->enum('gender', ['lk', 'pr']);
            $table->integer('age')->nullable();
            $table->string('phone');
            $table->text('address')->nullable();
            $table->boolean('is_have_umkm');
            $table->string('umkm')->nullable();
            $table->enum('status', ['registered', 'accepted', 'rejected'])->default('registered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
