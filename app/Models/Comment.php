<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    public function commentable()
    {
        return $this->morphTo();
    }

    //rel 1:n polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    //rel 1:n inversa 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
