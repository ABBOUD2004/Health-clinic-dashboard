<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('patient_requests', function (Blueprint $table) {
            $table->dropColumn('doctor'); // العمود القديم
        });
    }

    public function down(): void
    {
        Schema::table('patient_requests', function (Blueprint $table) {
            $table->string('doctor'); // ممكن تحدد length و default لو حبيت
        });
    }
};
