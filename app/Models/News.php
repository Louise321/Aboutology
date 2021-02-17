<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Constants\GlobalConstants;
use App\Models\Category;
use App\Utilities\FilterBuilder;

class News extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'news';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'category',
        'description'
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('title',  'like', '%'.$search.'%')
                ->orWhere('category',  'like', '%'.$search.'%');
    }
     protected static $logAttributes = ['name', 'text'];

    
    public static function getUsers($search_keyword,$category) {

        $news = DB::table('news');

        if($search_keyword && !empty($search_keyword)) {
            $news->where(function($q) use ($search_keyword) {
                $q->where('news.title', 'like', "%{$search_keyword}%");
            })->orderBy('id','DESC');
        }

        // Filter By Country
        if($category && $category !== GlobalConstants::ALL) {
            $news = $news->where('news.id', $category);
        }

        return $news->orderBy('id','DESC')->paginate(10);

    }
  
    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utilities\ArticleFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }


}
