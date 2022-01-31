<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    //rel 1:1
    public function pofile()
    {
        return $this->hasOne('App\Models\Profile');
    }
    //relacion 1:m
    public function courses_dictates()
    {
        return $this->hasMany('App\Models\Course');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function reactions()
    {
        return $this->hasMany('App\Models\Reaction');
    }

    //relacion n:m
    public function courses_enrolled()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function lessons()
    {
        return $this->belongsToMany('App\Models\Lesson');
    }
}
