<?php

namespace App\Models;

use App\Traits\UploadImage;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model implements TranslatableContract
{
    use HasFactory, Translatable, UploadImage;

    public $translatedAttributes = ['title', 'body'];
    protected $fillable = ['user_id', 'domain_id', 'slug', 'image'];
    protected $appends = ['image_path'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            $blog->slug = $blog->createSlug($blog->translate('en')->title);
        });
        static::updated(function ($blog) {
            $blog->slug = $blog->createSlug($blog->translate('en')->title);
        });
    }

    #-------------------------------- Attributes -----------------------------------#
    public function getImagePathAttribute()
    {
        if ($this->image) {
            return Storage::url($this->getStorageImagePath() . '/blogs/' . $this->image);
        }

        return null;
    } // end of getImagePathAttribute

    #-------------------------------- Relations -----------------------------------#

    /**
     * Get the user that owns the Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the domain that owns the Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }

    public function data(){

        return $this->hasMany(BlogTranslation::class , 'blog_id' , 'id');
    }

    #-------------------------------- Functions -----------------------------------#

    private function createSlug($title)
    {
        return Str::slug($title);

        // For duplication title.

        // if (static::whereSlug($slug = Str::slug($title))->exists()) {
        //     $max = static::whereTranslation('title', $title)->latest('id')->skip(1)->value('slug');
        //     if (isset($max[-1]) && is_numeric($max[-1])) {
        //         return preg_replace_callback('/(\d+)$/', function ($mathces) {
        //             return $mathces[1] + 1;
        //         }, $max);
        //     }
        //     return "{$slug}-2";
        // }
        // return $slug;
    }
}