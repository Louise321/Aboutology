<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Utilities\FilterBuilder;
use Spatie\Activitylog\Traits\LogsActivity;
class Forum extends Model
{
    // use HasFactory;

    use Likable;
    use HasFactory;
    use LogsActivity;
    protected $guarded = [];
    protected $table = 'forums';
    public $timestamps = true;
    

    protected static $logAttributes = ['name', 'text'];

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

    public function commentcount()
    {
        return $this->hasMany(Comment::class);
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


}

    // public static function forumComment()
    // {
    //     $forumComment = DB::table('forums')
    //         ->leftJoin('comments', 'forums.id', '=', 'comments.commentable_id')
    //         ->select('forums.id', DB::raw('count(comments.commentable_id) as commentCount'))
    //         ->groupBy('forums.id')
    //         ->orderByDesc('forums.id')
    //         ->get();

    //         return $forumComment->all();
    // }
    // public function likes()
    // {
    //     return $this->hasMany(Like::class)->where('liked', true);
    // }

    // public function dislike()
    // {
    //     return $this->hasMany(Like::class)->where('liked', false);
    // }

