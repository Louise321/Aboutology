<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Utilities\FilterBuilder;
use App\Constants\GlobalConstants;

class Article extends Model
{
    use Likable;
    use HasFactory;

    protected $guarded = [];
    protected $table = 'articles';
    public $timestamps = true;

    protected $fillable = [
        'title',
        // 'category',
        // 'file_path',
        'description'
    ];

    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utilities\ArticleFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
