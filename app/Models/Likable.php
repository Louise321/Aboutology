<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


trait Likable
{
    // use HasFactory;

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select article_id, sum(liked) likes, sum(!liked) dislikes from likes group by article_id',
            'likes',
            'likes.article_id',
            'article_id'
        );
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id'[$user ? $user->id :  auth()->id()],
            //    'user_id' ->  $user->id,
                
            ], [
                'liked' => $liked,
                // $liked=str_split($liked)
            ]
        );
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('article_id', $this->id)
            ->where('liked', true)
            ->count();

    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('article_id', $this->id)
            ->where('liked', false)
            ->count();

    }

    public function likes()
    {
        return $this->hasMany(Like::class)->where('liked', true);;
    }
}
