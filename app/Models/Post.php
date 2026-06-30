<?php

namespace App\Models;

use App\Services\ReadingTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image',
        'meta_title', 'meta_description', 'focus_keyword', 'reading_time',
        'category_id', 'author', 'status', 'views', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if (blank($post->slug)) {
                $post->slug = static::uniqueSlug($post->title, $post->id);
            }
            // Tempo de leitura calculado a partir do conteúdo
            $post->reading_time = ReadingTime::minutes((string) $post->content);

            // Defaults de SEO
            if (blank($post->meta_title)) {
                $post->meta_title = Str::limit(strip_tags((string) $post->title), 60, '');
            }
            if (blank($post->excerpt)) {
                $post->excerpt = Str::limit(trim(strip_tags((string) $post->content)), 160);
            }
            if (blank($post->meta_description)) {
                $post->meta_description = Str::limit(trim(strip_tags((string) ($post->excerpt ?: $post->content))), 155);
            }
            if ($post->status === 'published' && blank($post->published_at)) {
                $post->published_at = now();
            }
        });
    }

    // ── Relações ───────────────────────────────────────────────
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    // ── Scopes ─────────────────────────────────────────────────
    /** Apenas posts publicados e com data de publicação já alcançada (suporta agendamento). */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (! $term) {
            return $query;
        }
        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
              ->orWhere('excerpt', 'like', "%{$term}%")
              ->orWhere('focus_keyword', 'like', "%{$term}%");
        });
    }

    // ── Helpers ────────────────────────────────────────────────
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function isPublished(): bool
    {
        return $this->status === 'published'
            && $this->published_at
            && $this->published_at->lte(now());
    }

    public function featuredImageUrl(): ?string
    {
        if (blank($this->featured_image)) {
            return null;
        }
        if (Str::startsWith($this->featured_image, ['http://', 'https://'])) {
            return $this->featured_image;
        }
        return asset($this->featured_image);
    }

    public function incrementViews(): void
    {
        // Atualização leve sem disparar eventos/timestamps
        static::withoutEvents(fn () => $this->newQuery()->whereKey($this->getKey())->increment('views'));
    }

    protected static function uniqueSlug(string $value, $ignoreId = null): string
    {
        $base = Str::slug($value);
        $slug = $base;
        $i = 2;
        while (static::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }
        return $slug;
    }
}
