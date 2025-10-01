<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // مين بعت الدعوة
            $table->string('email'); // ايميل المدعو
            $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
            $table->timestamps();

            // علاقة مع جدول المستخدمين
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'email']); // نفس الشخص مش ممكن يبعت دعوة لنفس الايميل مرتين
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invites');
    }
};
