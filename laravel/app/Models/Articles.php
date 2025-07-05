<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Articles extends Model
{
    protected $fillable = [
        'title',
        'url_key',
        'category',
        'short_description',
        'content',
        'image_desktop',
        'image_mobile',
        'updated_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Boot the model and add event listeners
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->url_key)) {
                $article->url_key = Str::slug($article->title) . '-' . now()->format('d-m-y');
            }
        });
    }

    /**
     * User relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'uuid');
    }

    /**
     * Scope for published articles
     */
    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('content')->where('content', '!=', '');
    }

    /**
     * Scope for articles by category
     */
    public function scopeByCategory(Builder $query, string $category): void
    {
        $query->where('category', $category);
    }

    /**
     * Scope for recent articles
     */
    public function scopeRecent(Builder $query, int $days = 30): void
    {
        $query->where('updated_at', '>=', now()->subDays($days));
    }

    /**
     * Get formatted publish date
     */
    public function getPublishDateAttribute(): string
    {
        return $this->updated_at->format('F j, Y');
    }

    /**
     * Get excerpt from content
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->content), 150);
    }

    /**
     * Get full image URL for desktop
     */
    public function getDesktopImageUrlAttribute(): string
    {
        return $this->image_desktop 
            ? asset('img/upload/' . $this->image_desktop)
            : asset('img/default-article-desktop.jpg');
    }

    /**
     * Get full image URL for mobile
     */
    public function getMobileImageUrlAttribute(): string
    {
        return $this->image_mobile 
            ? asset('img/upload/' . $this->image_mobile)
            : asset('img/default-article-mobile.jpg');
    }

    /**
     * Check if article has images
     */
    public function hasImages(): bool
    {
        return !empty($this->image_desktop) || !empty($this->image_mobile);
    }

    /**
     * Get related articles
     */
    public function getRelatedArticles(int $limit = 3): \Illuminate\Database\Eloquent\Collection
    {
        return static::where('id', '!=', $this->id)
            ->where('category', $this->category)
            ->published()
            ->latest('updated_at')
            ->limit($limit)
            ->get();
    }

    /**
     * Enhanced datatable method with better structure
     */
    public function getDatatable(int $length, int $start, ?string $searchValue, int $orderColumn, string $orderDir, string $order, ?string $sektor = null): array
    {
        $query = $this->newQuery()
            ->select('*');

        $countAll = $query->count();

        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('url_key', 'like', "%{$searchValue}%")
                  ->orWhere('title', 'like', "%{$searchValue}%")
                  ->orWhere('short_description', 'like', "%{$searchValue}%");
            });
        }

        $fieldTable = ['url_key', 'title', 'category', 'updated_at'];
        
        if (isset($fieldTable[$orderColumn])) {
            $query->orderBy($fieldTable[$orderColumn], $orderDir);
        } else {
            $query->orderBy('url_key', 'asc');
        }
        
        return [
            "recordsTotal" => $countAll,
            "recordsFiltered" => $query->count(),
            "data" => $query->skip($start)->limit($length)->get(),
        ];
    }

    /**
     * Generate URL key from title
     */
    public function generateUrlKey(): string
    {
        return Str::slug($this->title) . '-' . now()->format('d-m-y');
    }
}
