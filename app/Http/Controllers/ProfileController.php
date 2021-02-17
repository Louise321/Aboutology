<?php

namespace App\Http\Controllers;

use DB;
use Session;
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
        // $profile = Profile::latest()->paginate(6);  
        $profiledata = Profile::Where('user_id','=',Auth::user()->id)->first();
        $userName = Auth::user()->name;
        $userEmail = Auth::user()->email;
        $timeline = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','!=','Search query')->orderBy('id', 'DESC')->get();
        $searches = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','=','Search query')->orderBy('id', 'DESC')->get();
        $forumcount = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','=','createdForum')->count();
        $commentcount = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','=','Commented on forums')->count();
     $viewcount=DB::table('forums')->where('user_id', Auth::user()->id)->sum('views');
        //  $likecount = Activity::Where('causer_id','=',Auth::user()->id)->Where('description','!=','Search query')->orderBy('id', 'DESC')->get();
       
        return view('user.profile',compact('profiledata','userName','userEmail','timeline','searches','forumcount','commentcount','viewcount'));
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
        $profile = Profile::findOrFail($id);

        // $cat = Article::with(['category'])->filterBy(request()->all())->get();
        // $cat_list = Category::all();
        // $testing123 = Article::Where('category_id', $id)->get();

        return view('user.setting', compact('profile'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Profile $profile)
    // {
    //     //
    // }

    public function update(Request $request, $id)
    {

        $profile = Profile::findOrFail($id);
        $profile->fullname = $request->name;
        $profile->short_desc = $request->desc;
        $profile->date_of_birth = $request->dob;
        // $profile->phone = $request->phone;

        // $file = $request->file('profilepic_path');
        // $extension = $file->getClientOriginalExtension();
        // $filename = time() . '.' . $extension;
        // $file->move('uploads/profilePic', $filename);
        // $profile->profilepic_path = $filename;

        
        if($request->hasFile('profilepic_path')) {     

          //upload new file
          $file = $request->file('profilepic_path');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '.' . $extension;
          $file->move('uploads/profilePic', $filename);
          $profile->profilepic_path = $filename;

          
        }

        

        $message = $profile->isDirty() ? "Profile updated successfully!" : "No data changed";  
        
        $profile->save();

        return back()->with('updated_profile', $message);

        

        // if ($request->hasFile('file_path')) {
        //     $file = $request->file('file_path');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('uploads/image', $filename);
        //     $article->file_path = $filename;
        // }
        
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

    public static function userProfile()
    {
        $profiledata = Profile::select('profilepic_path')->Where('user_id','=',Auth::user()->id)->first();

        return $profiledata;
    }

}
