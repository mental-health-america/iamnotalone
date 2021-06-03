<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return users post
     * 
     * @return object
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Return users comments
     * 
     * @return object
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Return users comments
     * 
     * @return object
     */
    public function peersComments()
    {
        return $this->hasMany('App\Models\PeersForumComments');
    }
}
