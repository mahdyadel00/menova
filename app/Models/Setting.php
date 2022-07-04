<?php

namespace App\Models;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AboutUs extends Model
{
    use HasFactory, UploadImage;
    // public $translatedAttributes = ['title', 'description' , 'about_title', 'about_description'];
    protected $guarded = [];
    protected $appends = ['image_path'];


    #-------------------------------- Attributes -----------------------------------#
    public function getImagePathAttribute()
    {
        if ($this->image) {
            return Storage::url($this->getStorageImagePath() . '/settings/' . $this->image);
        }

        return null;
    } // end of getImagePathAttribute

    public function getImageAttribute($value)
	{
		if(\request()->is('api/*')){
			return url( $value);
		}
		return $value;
	}

        public function getImageNameEncoded(){
            return dirname($this->image).'/'.rawurlencode(basename($this->image));
        }


}
