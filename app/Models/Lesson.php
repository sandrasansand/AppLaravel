<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    

    use HasFactory;
    protected $guarded = ['id'];

    public function getCompletedAttribute(){
       return $this->users->contains(auth()->user()->id);

    }

    //rel inversa 1:n
    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }
    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }

    //rel 1:1 
    public function description()
    {
        return $this->hasOne('App\Models\Description');
    }
    //rel n:m
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

     //rel 1:1 polimorfica
     public function resource()
     {
         return $this->morphOne('App\Models\Resource', 'resourceable');
     }
     
     //rel 1:n polimorfica
     public function comments(){
         return $this->morphMany('App\Models\Comment', 'commentable');
     }

     public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
