<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Article;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    // Most popular article
    public function barChart()
    {
        $article = Article::select(DB::raw("title as article"))
                    ->where('views', '>', 10)
                    ->select('title')
                    ->orderBy('views','DESC')
                    ->take(5)
                    ->get();

        $views = Article::select(DB::raw("views as No. of Views"))
                    ->where('views', '>', 10)
                    ->select('views')
                    ->orderBy('views','DESC')
                    ->get();
        
        $data = array(0,0,0,0,0);
        foreach($article as $index -> $article)
        {
            $data[$article] = $views[$index];
        }
        return view('bar-chart', compact('data'));

        
    }
}
