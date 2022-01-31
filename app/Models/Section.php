<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    // rel 1:m inversa
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    //rel 1:n
    public function lessons() 
    {
        return $this->hasMany('App\Models\Lesson');
    }
  
}
