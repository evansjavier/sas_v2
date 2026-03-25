<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'callsign')) {
                $table->string('callsign')->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable()->after('gender');
            }
            if (!Schema::hasColumn('users', 'post_code')) {
                $table->string('post_code')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'city')) {
                $table->string('city')->nullable()->after('post_code');
            }
            // Agregando el country a través del ID o Code
            if (!Schema::hasColumn('users', 'country_id')) {
                $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('set null')->after('city');
            }
            if (!Schema::hasColumn('users', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable()->after('country_id');
            }
            if (!Schema::hasColumn('users', 'place_of_birth')) {
                $table->string('place_of_birth')->nullable()->after('date_of_birth');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropColumn([
                'phone', 'gender', 'callsign', 'address', 'post_code', 'city', 'country_id', 'date_of_birth', 'place_of_birth'
            ]);
        });
    }
};
