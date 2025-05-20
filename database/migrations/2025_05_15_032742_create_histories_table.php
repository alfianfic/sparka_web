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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
        $table->integer('CO');
        $table->float('FEV1');
        $table->float('FVC');
       $table->foreignId('user_id') // nama kolom relasi
             ->constrained('users') // referensi ke tabel users
             ->onDelete('cascade'); 
        $table->date('Date');
        $table->string('Status');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
