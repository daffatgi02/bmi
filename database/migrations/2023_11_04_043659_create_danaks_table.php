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
        Schema::create('danaks', function (Blueprint $table) {
            $table->id();
            $table->string("nama_anak");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            // $table->string("umur");
            $table->string("jk");
            $table->string("t_posyandu");
            $table->string("nik_anak");
            $table->string("nowa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danaks');
    }
};
