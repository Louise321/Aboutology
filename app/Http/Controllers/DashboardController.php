<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $guard = 'admin';

    public function index(){
        //return view('administrators.dashboard');

        $article = Article::select(DB::raw("title as article"))
                    ->where('views', '>', 1)
                    ->select('title')
                    ->orderBy('views','DESC')
                    ->take(5)
                    ->get();

        // $views = Article::select(DB::raw("views as No. of Views"))
        //             ->where('views', '>', 1)
        //             ->select('views')
        //             ->orderBy('views','DESC')
        //             ->take(5)
        //             ->get();
        
        $views = [];

        foreach($article as $index -> $article)
        {
            $views[] = Article::select(DB::raw("views as No. of Views"))
                        ->where('views', '>', 1)
                        ->select('views')
                        ->orderBy('views','DESC')
                        ->take(5)
                        ->get();
        }
        return view('administrators.dashboard')
        ->with('article',json_encode($article))
        ->with('views',json_encode($views,JSON_NUMERIC_CHECK));



/* 
$view = ['2015','2016','2017','2018','2019','2020'];

        $article = [];
        foreach ($view as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }
*/


    }

    // Most popular article
    public function barChart()
    {
        $article = Article::select(DB::raw("title as article"))
                    ->where('views', '>', 1)
                    ->select('title')
                    ->orderBy('views','DESC')
                    ->take(5)
                    ->get();

        $views = Article::select(DB::raw("views as No. of Views"))
                    ->where('views', '>', 1)
                    ->select('views')
                    ->orderBy('views','DESC')
                    ->get();
        
        $datas = array(0,0,0,0,0);
        foreach($article as $index -> $article)
        {
            $data[$article] = $views[$index];
        }
        return view('administrators.dashboard', compact('datas'));

        
    }
}
