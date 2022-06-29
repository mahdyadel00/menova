<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title', 'description' , 'about_title', 'about_description'];
}
