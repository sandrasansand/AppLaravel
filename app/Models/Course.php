<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    protected $guarded = ['id', 'status'];
    protected $withCount = ['students','reviews'];

    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    //query scopes

    public function scopeCategory($query, $category_id){
        if ($category_id) {
          return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id){
        if ($level_id) {
          return $query->where('level_id', $level_id);
        }
    }

    public function getRatingAttribute(){
        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 2);
        }else{
            return 5;
        }
       
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

//rel 1:1
public function observation(){
    return $this->HasOne('App\Models\Observation');
}


    //rel 1:n inversa
    public function teachers()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    //rel m:n inversa
    public function students()
    {
        return $this->BelongsToMany('App\Models\User');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    //rel 1 : m
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }
    //rel 1:1 polimorfica
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //tres tablas
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section'); //change
    }

}
