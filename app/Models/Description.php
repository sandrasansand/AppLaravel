<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    //rel 1:1 inversa
    public function lesson()
    {
        return $this->hasOne('App\Models\Lesson');
    }
}
