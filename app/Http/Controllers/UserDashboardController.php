<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(){
        
        return view('administrators.dashboard');
       
    }


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
