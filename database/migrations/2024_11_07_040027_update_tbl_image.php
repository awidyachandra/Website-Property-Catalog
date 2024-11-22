<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tbl_images', function (Blueprint $table) {
            $table->unsignedBigInteger('galeri_id')->after('id');
            $table->foreign('galeri_id')->references('id')->on('tbl_galeri')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('tbl_images', function (Blueprint $table) {
            $table->dropForeign(['galeri_id']);
            $table->dropColumn('galeri_id');
        });
    }    
};
