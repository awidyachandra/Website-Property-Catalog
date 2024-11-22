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
        Schema::create('tbl_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galeri_id'); // Kolom untuk menghubungkan dengan tbl_galeri
            $table->string('image'); // Nama file gambar
            $table->timestamps();
    
            // Menambahkan foreign key constraint untuk galeri_id
            $table->foreign('galeri_id')->references('id')->on('tbl_galeri')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_image');
    }
};
