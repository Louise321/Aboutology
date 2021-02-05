<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Utilities\FilterBuilder;

class Forum extends Model
{
    // use HasFactory;

    use Likable;
    use HasFactory;

    protected $guarded = [];
    protected $table = 'forums';
    public $timestamps = true;

    protected $fillable = [
        'title',
        // 'category',
        // 'file_path',
        'content'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //comments
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    //category
    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utilities\ArticleFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // public function likes()
    // {
    //     return $this->hasMany(Like::class)->where('liked', true);
    // }

    // public function dislike()
    // {
    //     return $this->hasMany(Like::class)->where('liked', false);
    // }
}
