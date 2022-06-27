<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Topic extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name'];
    protected $fillable = ['slug'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($topic) {
            $topic->slug = $topic->createSlug($topic->translate('en')->name);
        });
        static::updated(function ($topic) {
            $topic->slug = $topic->createSlug($topic->translate('en')->name);
        });
    }


    #-------------------------------- Relations -----------------------------------#

    /**
     * Get all of the discusses for the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discusses(): HasMany
    {
        return $this->hasMany(Discuss::class, 'topic_id');
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