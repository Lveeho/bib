<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;



class Book extends Model implements HasMedia
{
    use SoftDeletes,HasMediaTrait;
    //
    protected $fillable = [
        'ISBN','booktitle','author_id','year','edition','description','photo_id'
    ];
    public function barcodes(){
        return $this->hasMany('App\Barcode');
    }
    public function author(){
        return $this->belongsTo('App\Author');
    }


    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
    }
}
