<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\RaisTranslation;

class Rais extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function data(){

        return $this->hasMany(RaisTranslation::class , 'rais_id' , 'id');
    }
}
