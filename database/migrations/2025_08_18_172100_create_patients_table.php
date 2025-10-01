<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
               $table->bigIncrements('patient_id'); // المفتاح الأساسي
            $table->string('patient_name');
            $table->integer('age')->nullable();
            $table->string('disease')->nullable();
            $table->string('doctor')->nullable();
            $table->date('appointment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
