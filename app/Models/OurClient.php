<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



class OurClient extends Model
{

    use HasFactory, UploadImage;

    protected $fillable = ['published', 'image'];
    protected $appends = ['image_path'];

       #-------------------------------- Attributes -----------------------------------#
       public function getImagePathAttribute()
       {
           if ($this->image) {
               return Storage::url($this->getStorageImagePath() . '/our_clients/' . $this->image);
           }
   
           return null;
       } // end of getImagePathAttribute

       public function getImageNameEncoded(){
        return dirname($this->image).'/'.rawurlencode(basename($this->image));
    }

}
