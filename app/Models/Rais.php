<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rais extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'description'];
    // protected $fillable = ['published', 'image' , 'icon'];
    // protected $appends = ['image_path'];

    protected $guarded = [];

    public function data(){

        return $this->hasMany(RaisTranslation::class , 'rais_id' , 'id');
    }
}
