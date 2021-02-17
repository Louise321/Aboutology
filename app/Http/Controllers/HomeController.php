<?php

namespace App\Http\Controllers;

use DB;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Article;
use App\Models\Forum;
use App\Models\Profile;
use App\Models\UserPreference;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){

        $banners = Banner::where('status','1')->get();
        
        $latestArticle=Article::with(['category'])->filterBy(request()->all())->orderBy('created_at','DESC')->limit(6)->get();
        $test = Article::all();
        $userSubCat = UserPreference::where('user_id',Auth::user()->id)->where('subscription','1')->pluck('category_id')->toArray();
       
        /* $recommendedArticle = Article::whereIn('category_id', $userSubCat)->orderBy('id','DESC')->limit(3)->get(); */
        $recommendedArticle=Article::with(['category'])->filterBy(request()->all())->whereIn('category_id', $userSubCat)->orderBy('created_at','DESC')->limit(3)->get();
 
        $forumSection = Forum::where('user_id',Auth::user()->id)->limit(3)->get();

        /* Mansory */
        $popularArticle=Article::orderBy('views','DESC')->first();
        $popularArticle2=Article::orderBy('views','DESC')->skip(1)->first();
        $popularArticle34=Article::orderBy('views','DESC')->skip(2)->limit(2)->get();


        /* Forum Part  */
            $forumLastComment = DB::table('forums')
            ->join('comments','forums.id','=','comments.commentable_id')
            ->join('users','comments.user_id','=','users.id')
            ->join('profiles','users.id','=','profiles.user_id')
            ->select('forums.*','comments.user_id as replied_UID','comments.comment','users.name as comment_username','profiles.profilepic_path','comments.created_at as last_updated')
            ->where('forums.user_id','=',Auth::user()->id)  
            ->orderBy('last_updated','DESC') 
            ->limit(3)        
            ->get();   

            /* Last 3 forums */
            $lastforum = DB::table('forums')
            ->join('users','forums.user_id','=','users.id')
            ->join('profiles','users.id','=','profiles.user_id')
            ->select('forums.*','users.name as comment_username','profiles.profilepic_path')
            ->where('forums.user_id','=',Auth::user()->id)  
            ->orderBy('forums.created_at','DESC') 
            ->limit(3)        
            ->get();  
        
        return view('dashboard',compact('banners','latestArticle','recommendedArticle','popularArticle' ,'popularArticle2' ,'popularArticle34','forumLastComment','lastforum'));
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

        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $userPref = UserPreference::join('categories','user_preferences.category_id','=','categories.id')
        ->select('user_preferences.*','categories.name')
        ->where('user_preferences.user_id',Auth::user()->id)->get();
        $category_list=Category::all();
        $users = User::find(Auth::user()->id);

        return view('user.setting',compact('profile','userPref', 'users'));
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

    public function setup(){
        $category_list = Category::all();
        return view('user.qwert',compact('category_list'));
    }

}
