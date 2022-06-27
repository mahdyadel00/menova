<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class Discuss extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'topic_id', 'published', 'user_id', 'uuid'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($discuss) {
            $discuss->uuid = Str::uuid();
        });
        static::updating(function ($discuss) {
            $discuss->uuid = Str::uuid();
        });
    }

    #-------------------------------- Scopes -----------------------------------#

    /**
     * Published discussions.
     *
     * @param [type] $query
     * @return void
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * UnPublished discussions.
     *
     * @param [type] $query
     * @return void
     */
    public function scopeUnPublished($query)
    {
        return $query->where('published', false);
    }

    #-------------------------------- Relations -----------------------------------#

    /**
     * Get the topic that owns the Discuss
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    /**
     * Get the user that owns the Discuss
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the comments for the Discuss
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    /**
     * Get all of the likes for the Discuss
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likable');
    }
}