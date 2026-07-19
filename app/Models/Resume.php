<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'professional_title',
        'target_role',
        'experience_level',
        'years_of_experience',
        'availability',
        'preferred_work_mode',
        'email',
        'phone',
        'location',
        'portfolio_url',
        'linkedin_url',
        'github_url',
        'photo_path',
        'tone',
        'summary',
        'core_skills',
        'languages',
        'work_experiences',
        'internships',
        'education',
        'projects',
        'certifications',
        'achievements',
    ];

    protected $casts = [
        'years_of_experience' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
