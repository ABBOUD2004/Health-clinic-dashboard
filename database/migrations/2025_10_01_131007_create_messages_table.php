<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // لازم نفس النوع بالظبط زي patients.patient_id
            $table->unsignedBigInteger('patient_id');

            $table->text('message');
            $table->timestamps();

            // العلاقة
            $table->foreign('patient_id')
                  ->references('patient_id')
                  ->on('patients')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
