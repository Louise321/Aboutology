<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiledata = Profile::Where('user_id','=',Auth::user()->id)->first();
        $userName = Auth::user()->name;
        $userEmail = Auth::user()->email;
        $timeline = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','!=','Search query')->orderBy('id', 'DESC')->get();
        $searches = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','=','Search query')->orderBy('id', 'DESC')->get();
        $forumcount = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','=','createdForum')->count();
        $commentcount = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','=','Commented on forums')->count();
      //  $likecount = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','!=','Search query')->orderBy('id', 'DESC')->get();
       
        return view('user.profile',compact('profiledata','userName','userEmail','timeline','searches','forumcount','commentcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $Profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
