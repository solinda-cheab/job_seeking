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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->unique();
            $table->string('professional_title')->nullable();
            $table->string('target_role')->nullable();
            $table->string('experience_level')->default('junior');
            $table->unsignedTinyInteger('years_of_experience')->nullable();
            $table->string('availability')->nullable();
            $table->string('preferred_work_mode')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 40)->nullable();
            $table->string('location')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('tone')->default('balanced');
            $table->text('summary')->nullable();
            $table->text('core_skills')->nullable();
            $table->text('languages')->nullable();
            $table->text('work_experiences')->nullable();
            $table->text('internships')->nullable();
            $table->text('education')->nullable();
            $table->text('projects')->nullable();
            $table->text('certifications')->nullable();
            $table->text('achievements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
