<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view('dashboard');
    }

    public function knowledge(){
        return view('user.knowledge');
    }

    public function profile(){

        return view('user.profile');
    }

    // public function article(){
    //     return view('user.article');
    // }

    // public function adetail(){
    //     return view('user.articledetails');
    // }

    public function forum(){
        return view('user.forum');
    }

    public function fdetail(){
        return view('user.forumdetails');
    }

    public function news(){
        return view('user.news');
    }

    public function ndetail(){
        return view('user.newsdetails');
    }

    // public function udashboard(){
    //     return view('user.dashboard');
    // }

    public function calendar(){
        return view('calendar');
    }

    public function helpc(){
        return view('user.helpcenter');
    }

    public function setting(){
        return view('user.setting');
    }

    public function test(){
        return view('user.test');
    }

    public function twofactor(){
        return view('auth.two-factor-challenge');
    }

    public function confirm(){
        return view('auth.confirm-password');
    }

}
