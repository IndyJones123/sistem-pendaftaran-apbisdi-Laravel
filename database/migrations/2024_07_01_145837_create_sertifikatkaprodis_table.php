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
        Schema::create('sertifikatkaprodis', function (Blueprint $table) {
            $table->id();
            $table->date('tglmulai');
            $table->date('tglberakhir');
            $table->string('status');
            $table->string('link');
            //Foreign Key
            $table->integer('id_kaprodi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikatkaprodis');
    }
};
