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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->date('date_in');
            $table->foreignId('id_patient')->constrained('patients', 'id')->cascadeOnDelete();
            $table->string('diagnoses');
            $table->string('recipe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropForeign('consultations_id_patient_foreign');
        });
        Schema::dropIfExists('consultations');
    }
};
