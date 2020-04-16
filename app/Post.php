<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tag;

class Post extends Model
{
    // public $fillable = ['slug'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function scopePublished($query){
        return $query->where('online', true);
    }

    // public function setSlugAttribute($value){
    //     if(empty($value)){
    //         $this->attributes['slug'] = Str::slug($this->title);
    //     }
    // }

    public function setOnlineAttribute($value){
        if(empty($value)){
            $this->attributes['online'] = 0;
        }
        else{
            $this->attributes['online'] = 1;
        }
    }

    public function getDates(){
        return ['created_at', 'updated_at', 'published_at'];
    }
}
