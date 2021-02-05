<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Feedback;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;

class AdminController extends Controller
{

    protected $guard = 'admin';

    public function index(){
        // return view('administrators.dashboard');
    }

    public function showLoginForm()
    {
        return view('administrators.login');
    }

    public function feedback()
    {
       
        /* $feedback_opened = Feedback::Where('status', "Opened")->get();
        $feedback_closed = Feedback::Where('status', "Closed")->get();
        return view('administrators.feedback')->with(compact('feedback_opened','feedback_closed')); */
        return view('administrators.home');
    }

    public function test()
    {
        return view('administrators.test');
    }

    public function article()
    {
        return view('administrators.article.index');
    }

    public function testnewspage()
    {
        return view('administrators.news.news_page');
    }

    
    public function settingpage()
    {
        return view('administrators.setting');
    }

    public function newspage(Request $request)
    {
        return view('administrators.news.index');
    }

    public function banners(Request $request)
    {
        return view('administrators.banners.index');
    }
    /** Login de administrador*/
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        var_dump($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

}
