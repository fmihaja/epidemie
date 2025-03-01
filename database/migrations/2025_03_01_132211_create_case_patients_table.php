<?php

use App\Models\Patient;
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
        Schema::create('case_patients', function (Blueprint $table) {
            $table->id();
            $table->date('diagnosis_date');
            $table->enum('status', [
                'suspecté', 
                'confirmé', 
                'guéri', 
            ])->default('suspecté');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_patients');
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }
};
