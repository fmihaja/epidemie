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
        //
        Schema::create('disease_region', function (Blueprint $table) {
            $table->foreignId('region_id')->constrained();
            $table->foreignId('disease_id')->constrained();
            $table->timestamps(); // Optionnel (si vous voulez suivre les dates)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('region_disease');
    }
};
