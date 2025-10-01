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
        //     Schema::table('patient_requests', function (Blueprint $table) {
        //         $table->unsignedBigInteger('doctor_id')->nullable(); // أو بدون nullable حسب حاجتك
        //         $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
        //     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_requests', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropColumn('doctor_id');
        });
    }
};
