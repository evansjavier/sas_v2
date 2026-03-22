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
        Schema::table('users', function (Blueprint $table) {
            $table->string('license_number')->nullable()->after('email');
            $table->foreignId('preferred_hub_id')->nullable()->constrained('branches')->onDelete('set null')->after('license_number');
            $table->boolean('can_sparring')->default(false)->after('preferred_hub_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['preferred_hub_id']);
            $table->dropColumn(['license_number', 'preferred_hub_id', 'can_sparring']);
        });
    }
};
