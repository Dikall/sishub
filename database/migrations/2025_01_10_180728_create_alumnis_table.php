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
    Schema::create('alumni', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('tahun');
        $table->string('provinsi_bekerja')->nullable();
        $table->string('kabupaten_bekerja')->nullable();
        $table->string('nama_perusahaan')->nullable();
        $table->string('studi_lanjut')->nullable();
        $table->string('program_studi')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
