<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patient_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('patient_id');
            $table->unsignedInteger('age');
            $table->string('disease');
            $table->string('doctor'); // أو doctor_id لو هتربطه بجدول الأطباء
            $table->date('appointment_date');
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->bigIncrements('patient_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_requests');
    }
};
