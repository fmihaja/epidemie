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
        Schema::create('case_contact', function (Blueprint $table) {
            $table->id();
            $table->integer('contact_id');
            $table->integer('case_id');
            $table->timestamps();
            $table->foreign('contact_id')->references('id')->on('Contact')->onDelete('cascade');
            $table->foreign('case_id')->references('id')->on('Region')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_contact');
    }
};
