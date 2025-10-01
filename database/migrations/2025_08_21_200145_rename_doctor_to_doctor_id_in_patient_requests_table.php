<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Schema::table('patient_requests', function (Blueprint $table) {
        //     $table->renameColumn('doctor', 'doctor_id');
        // });
    }

    public function down()
    {
        Schema::table('patient_requests', function (Blueprint $table) {
            $table->renameColumn('doctor_id', 'doctor');
        });
    }
};
