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
        Schema::create('training_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->foreignId('enrollment_id')->constrained()->onDelete('cascade');
            $table->text('instructor_comment')->nullable();
            $table->tinyInteger('grade')->nullable();
            $table->enum('status', ['passed', 'failed', 'incomplete'])->default('passed');
            $table->timestamp('submitted_by_instructor_at')->nullable();
            $table->boolean('approved_by_student')->default(false);
            $table->timestamp('approved_by_student_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_records');
    }
};
