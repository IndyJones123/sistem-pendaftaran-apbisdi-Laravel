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
        Schema::create('pts', function (Blueprint $table) {
            $table->id();
            $table->string('namapt');
            $table->string('kodept');
            $table->string('alamat');
            $table->integer('nidn');
            $table->string('namapengelola');
            $table->string('telp');
            $table->string('namakaprodi');
            $table->string('email');
            $table->date('tgldaftar');
            $table->date('tglapprove');
            $table->date('tglberakhir');
            $table->string('berkas1');
            $table->string('berkas2');
            $table->string('berkas3');
            $table->string('status');

            //Foreign Key
            $table->integer('id_user');
            $table->integer('id_biaya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pts');
    }
};
