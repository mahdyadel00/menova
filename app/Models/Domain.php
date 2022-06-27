<?php

namespace App\Models;

use App\Traits\UploadImage;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Domain extends Model implements TranslatableContract
{
    use HasFactory, Translatable, UploadImage;

    public $translatedAttributes = ['name'];
    protected $fillable = ['image'];
    protected $appends = ['image_path'];

    #-------------------------------- Attributes -----------------------------------#
    public function getImagePathAttribute()
    {
        if ($this->image) {
            return Storage::url($this->getStorageImagePath() . '/domains/' . $this->image);
        }

        return asset('admin_assets/images/image.png');
    } // end of getImagePathAttribute


    #-------------------------------- Relations -----------------------------------#

    /**
     * Get all of the projects for the Domain
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'domain_id');
    } //end of hasMany projects

    /**
     * Get all of the users for the Domain
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'domain_id');
    }

    public function data(){

        return $this->hasMany(DomainTranslation::class);
    }

    #-------------------------------- Functions -----------------------------------#
    /**
     * Check if user has image.
     *
     * @return boolean
     */
    public function hasImage(): bool
    {
        return $this->image != null;
    }
} //end of model