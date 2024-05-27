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
            $table->foreignId('dposyandu_id')->constrained();
            $table->foreignId('users_id')->constrained();
            $table->string("nik_anak");
            $table->string("nama_anak");
            $table->date("tanggal_lahir");
            $table->string("jk");
            $table->string("nama_ortu");
            $table->string("nik_ortu");
            $table->string("hp_ortu");
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
