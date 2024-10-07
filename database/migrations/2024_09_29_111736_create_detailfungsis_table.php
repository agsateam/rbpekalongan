<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('fungsi1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungsi_id')->constrained('fungsis')->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->timestamps();
        });

        // Tambahkan untuk tabel lainnya
        Schema::create('fungsi2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungsi_id')->constrained('fungsis')->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->timestamps();
        });

        Schema::create('fungsi3', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungsi_id')->constrained('fungsis')->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->timestamps();
        });

        Schema::create('fungsi4', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungsi_id')->constrained('fungsis')->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->timestamps();
        });

        Schema::create('fungsi5', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungsi_id')->constrained('fungsis')->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
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
        Schema::dropIfExists('fungsi1');
        Schema::dropIfExists('fungsi2');
        Schema::dropIfExists('fungsi3');
        Schema::dropIfExists('fungsi4');
        Schema::dropIfExists('fungsi5');
    }
};
