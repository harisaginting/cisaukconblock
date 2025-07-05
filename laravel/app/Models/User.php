<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'token',
        'fullname',
        'gender',
        'phone',
        'address',
        'role',
        'uuid',
        'updated_by',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'integer',
        ];
    }

    /**
     * Boot the model and add event listeners
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->uuid)) {
                $user->uuid = Str::uuid();
            }
        });
    }

    /**
     * Get user by username with optional password
     */
    public function getUserByUsername(string $username, bool $includePassword = false): ?self
    {
        $query = $this->where('username', $username);
        
        if (!$includePassword) {
            $query->select(array_diff($this->fillable, ['password']));
        }
        
        return $query->first();
    }

    /**
     * Scope for admin users
     */
    public function scopeAdmin(Builder $query): void
    {
        $query->where('role', 1);
    }

    /**
     * Scope for regular users
     */
    public function scopeRegular(Builder $query): void
    {
        $query->where('role', 0);
    }

    /**
     * Scope for active users
     */
    public function scopeActive(Builder $query): void
    {
        $query->whereNull('confimation');
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 1;
    }

    /**
     * Check if user is active
     */
    public function isActive(): bool
    {
        return empty($this->confimation);
    }

    /**
     * Generate new token
     */
    public function generateToken(): string
    {
        $token = Str::uuid()->toString() . now()->format('dmY');
        $this->update(['token' => $token]);
        return $token;
    }

    /**
     * Get full name attribute
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->fullname ?: $this->name,
            set: fn ($value) => $this->fullname = $value,
        );
    }

    /**
     * Articles relationship
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Articles::class, 'updated_by', 'uuid');
    }

    /**
     * Settings relationship
     */
    public function settings(): HasMany
    {
        return $this->hasMany(Settings::class, 'updated_by', 'uuid');
    }
} 