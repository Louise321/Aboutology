<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Category;
use App\Models\Article;
use App\Models\Forum;
use App\Models\News;
use App\Models\User;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $guard = 'admin';

    public function index(){

        $users = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

        $articles = Article::select('title', 'views')
                ->orderBy('views', 'desc')
                ->limit(10)
                ->get();

        $tests = Comment::latest()->with('commentable')->count();

        $forums = Comment::join('forums', 'comments.commentable_id', '=', 'forums.id')
                ->select(\DB::raw("COUNT(forums.id) as count"), \DB::raw("MONTHNAME(forums.created_at) as month_name"), \DB::raw("COUNT(comments.commentable_id) as ccount"))
                ->whereYear('forums.created_at', date('Y'))
                ->groupBy('month_name')
                ->orderBy('month_name')
                ->get();

        //Count comment table
        $foru234 = Comment::select(\DB::raw("COUNT(id) as count"), \DB::raw("MONTHNAME(created_at) as month_name") )
                ->groupBy('month_name')
                ->orderBy('month_name')
                ->get();
                
        //Count forum table
        $foru = Forum::select(\DB::raw("COUNT(id) as count"), \DB::raw("MONTHNAME(created_at) as month_name") )
                ->groupBy('month_name')
                ->orderBy('month_name', 'desc')
                ->get();

        $frank = Forum::select('title', 'views')
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get();

        $userCount = User::select(\DB::raw("COUNT(*) as userCount"));
        $userCountThisM = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();

        $articleCount = Article::select(\DB::raw("COUNT(*) as count"));
        $articleCountThisM = Article::where('created_at', '>=', Carbon::now()->startOfMonth())->count();

        $forumCount = Forum::select(\DB::raw("COUNT(*) as count"));
        $forumCountThisM = Forum::where('created_at', '>=', Carbon::now()->startOfMonth())->count();

        $newsCount = News::select(\DB::raw("COUNT(*) as count"));
        $newsCountThisM = News::where('created_at', '>=', Carbon::now()->startOfMonth())->count();        
        
        $social_users = Article::join('categories', 'articles.category_id', '=', 'categories.id')
                ->selectRaw('count(articles.category_id) as count, categories.name as name')->groupBy('name')->get();
        
        $data=array();
        foreach ($social_users as $result) {
            $data[$result->name]=(int)$result->count;
        }

        return view('administrators.dashboard', compact('users', 'articles', 'forums', 'frank', 'userCount', 'userCountThisM', 'articleCount', 'forumCount', 'newsCount', 'articleCountThisM', 'forumCountThisM', 'newsCountThisM', 'data','foru234'
        ,'foru'));
        
        // return view('administrators.dashboard', compact('users', 'articles', 'forums', 'frank', 'userCount', 'userCountThisM', 'articleCount', 'forumCount', 'newsCount', 'articleCountThisM', 'forumCountThisM', 'newsCountThisM', 'data'));

    }

    public function testing()
    {
        $users = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

        $articles = Article::select('title', 'views')
                ->orderBy('views', 'desc')
                ->get();

        $forums = Forum::select(\DB::raw("COUNT(id) as count"), \DB::raw("MONTHNAME(created_at) as month_name"), \DB::raw("COUNT(views) as view"))
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name')
                ->orderBy('month_name')
                ->get();

        $rank = Article::select('title', 'views')
                ->orderBy('views', 'desc')
                ->limit(5)
                ->get();
        
        $frank = Forum::select('title', 'views')
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get();

        $userCount = User::select(\DB::raw("COUNT(*) as userCount"));

        $articleCount = Article::select(\DB::raw("COUNT(*) as count"));

        $forumCount = Forum::select(\DB::raw("COUNT(*) as count"));

        $newsCount = News::select(\DB::raw("COUNT(*) as count"));

        return view('administrators.dashboard', compact('users', 'articles', 'forums', 'rank', 'frank', 'userCount', 'articleCount', 'forumCount', 'newsCount'));
    }

}
