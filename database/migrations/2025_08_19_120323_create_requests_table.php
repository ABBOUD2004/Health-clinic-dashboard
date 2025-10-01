<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->date('dob')->nullable();
            $table->string('indication')->nullable();
            $table->enum('status', ['action_required', 'pending', 'new_request'])->default('new_request');
            $table->unsignedBigInteger('assigned_to');
            $table->timestamps();

            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
