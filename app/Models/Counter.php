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


class Counter extends Model implements TranslatableContract
{
    use HasFactory, Translatable, UploadImage;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['published', 'icon' , 'counter'];
    protected $appends = ['image_path'];



     #-------------------------------- Attributes -----------------------------------#
     public function getImagePathAttribute()
     {
         if ($this->image) {
             return Storage::url($this->getStorageImagePath() . '/counters/' . $this->image);
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

     public function data(){

         return $this->hasMany(CounterTranslation::class , 'counter_id' , 'id');
     }
}
