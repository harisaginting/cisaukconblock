<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Cache;

class Settings extends Model
{
    protected $fillable = [
        'name',
        'value',
        'updated_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * User relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'uuid');
    }

    /**
     * Scope for active settings
     */
    public function scopeActive(Builder $query): void
    {
        $query->whereNotNull('value')->where('value', '!=', '');
    }

    /**
     * Scope for settings by group
     */
    public function scopeByGroup(Builder $query, string $group): void
    {
        $query->where('name', 'like', "{$group}%");
    }

    /**
     * Get setting value by name with caching
     */
    public static function getValue(string $name, $default = null)
    {
        return Cache::remember("setting.{$name}", 3600, function () use ($name, $default) {
            $setting = static::where('name', $name)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Set setting value by name
     */
    public static function setValue(string $name, $value, ?string $updatedBy = null): bool
    {
        $setting = static::updateOrCreate(
            ['name' => $name],
            [
                'value' => $value,
                'updated_by' => $updatedBy,
            ]
        );

        Cache::forget("setting.{$name}");
        return $setting->exists;
    }

    /**
     * Get multiple settings by names
     */
    public static function getMultiple(array $names): array
    {
        return static::whereIn('name', $names)
            ->pluck('value', 'name')
            ->toArray();
    }

    /**
     * Get all settings as key-value array
     */
    public static function getAllAsArray(): array
    {
        return Cache::remember('settings.all', 3600, function () {
            return static::active()
                ->pluck('value', 'name')
                ->toArray();
        });
    }

    /**
     * Clear all settings cache
     */
    public static function clearCache(): void
    {
        Cache::forget('settings.all');
        
        // Clear individual setting caches
        static::pluck('name')->each(function ($name) {
            Cache::forget("setting.{$name}");
        });
    }

    /**
     * Get formatted value based on setting type
     */
    public function getFormattedValueAttribute()
    {
        $name = strtolower($this->name);
        
        if (str_contains($name, 'email')) {
            return filter_var($this->value, FILTER_VALIDATE_EMAIL) ? $this->value : null;
        }
        
        if (str_contains($name, 'phone')) {
            return preg_replace('/[^0-9+]/', '', $this->value);
        }
        
        if (str_contains($name, 'url')) {
            return filter_var($this->value, FILTER_VALIDATE_URL) ? $this->value : null;
        }
        
        return $this->value;
    }

    /**
     * Check if setting is valid
     */
    public function isValid(): bool
    {
        return !empty($this->value) && $this->value !== '';
    }
}
