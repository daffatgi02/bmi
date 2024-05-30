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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dbulans_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nama');
            $table->string('aktivitas');
            $table->string('data');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
