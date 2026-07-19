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
            $table->string('headline')->nullable()->after('name');
            $table->string('phone', 40)->nullable()->after('email');
            $table->string('location')->nullable()->after('phone');
            $table->string('preferred_language')->default('English')->after('role');
            $table->string('theme_preference')->default('light')->after('preferred_language');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'headline',
                'phone',
                'location',
                'preferred_language',
                'theme_preference',
            ]);
        });
    }
};
