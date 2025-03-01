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
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade'); 
            $table->foreignId('disease_id')->constrained('diseases')->onDelete('cascade');
            $table->date('dateDiagnosis');
            $table->enum('status',['confirmé','suspects','rétablie','normal','décédé'])->default('normal');
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
