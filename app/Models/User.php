<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'rol_id'
    ];

    // for comment testing
    public function forums() {
  
        return $this->hasMany(Forum::class);
     
    }

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

    public function getId()
    {
      return $this->id;
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
        // return $this->belongsToMany('App\Models\Article', 'likes', 'user_id', 'article_id');
    }

    public function article()
    {
        return $this->hasMany(Article::class);
        // return $this->belongsToMany('App\Mdoels\User', 'likes');
    }
}
