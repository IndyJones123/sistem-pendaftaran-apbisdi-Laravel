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
        Schema::create('individus', function (Blueprint $table) {
            $table->id();
            $table->string('namadosen');
            $table->integer('nidn');
            $table->string('notelp');
            $table->string('email');
            $table->string('dokumen1');
            $table->string('dokumen2');
            $table->string('dokumen3');
            $table->string('status');

            //Foreign Key
            $table->integer('id_pt');
            $table->integer('id_biaya');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individus');
    }
};
