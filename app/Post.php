<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','slug', 'content', 'user_id'];

    //FUNCTION UNO A MOLTI
    public function user(){

        return $this->belongsTo('App\User');
    }

    //FUNCTION MOLTI A MOLTI
    public function tags(){

        return $this->belongsToMany('App\Tag');
    }
}
