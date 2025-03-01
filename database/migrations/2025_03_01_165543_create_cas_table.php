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
        Schema::create('cas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients'); 
            $table->foreignId('diseases_id')->constrained('diseases');
            $table->date('dateDiagnosis');
            $table->enum('status',['confirmé','suspects','rétablie','normal'])->default('normal');
            $table->string('symptomes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cas');
    }
};
