<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Profile extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    //rel 1:1 inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
