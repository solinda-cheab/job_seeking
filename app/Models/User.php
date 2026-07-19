<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const LANGUAGE_LOCALES = [
        'English' => 'en',
        'Khmer' => 'km',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'headline',
        'email',
        'phone',
        'location',
        'password',
        'role',
        'preferred_language',
        'theme_preference',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function preferredLocale(): string
    {
        return static::localeCodeForLanguage($this->preferred_language);
    }

    public static function localeCodeForLanguage(?string $language): string
    {
        return static::LANGUAGE_LOCALES[$language ?? ''] ?? config('app.locale');
    }

    public static function languageForLocale(?string $locale): string
    {
        return array_search($locale, static::LANGUAGE_LOCALES, true) ?: 'English';
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }

    public function resume(): HasOne
    {
        return $this->hasOne(Resume::class);
    }
}
