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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner');
            $table->string('phone');
            $table->integer('fasilitator_id');
            $table->string('type');
            $table->text('desc');
            $table->text('address');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('marketplace')->nullable();
            $table->string('marketplace_link', length: 500)->nullable();
            $table->string('ktp')->nullable();
            $table->string('ktp_image')->nullable();
            $table->string('npwp')->nullable();
            $table->string('npwp_image')->nullable();
            $table->string('logo')->nullable();
            $table->enum('status', ["join", "registered"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
