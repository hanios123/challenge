<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class)->withPivot('title', 'rank','isWinner','description','code')->withTimestamps();
    }

    public function commented_challenges()
    {
        return $this->belongsToMany(Challenge::class,'comments');
    }

    public function organized_challenges()
    {
        return $this->hasMany(Challenge::class,'organizer_id')->withPivot('content')->withTimestamps();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
