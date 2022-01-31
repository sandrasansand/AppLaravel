<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    //rel 1:n
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
