<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Profile;
use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\HomeController;
use Redirect;

class SetupRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.setup');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'bio' => 'required',
            'dob' => 'required',
            'profile_pic' => 'required',
           
        ]);

        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            // Save the file locally in the storage/public/ folder under a new folder named /images
            $profile = $request->file->store('public/images');
            $profile->save(); // Finally, save the record.
        }

        $profile = new Profile();
        $profile->user_id = Auth::user()->id;
        $profile->fullname = Auth::user()->name;
        $profile->short_desc = $request->bio;
        if(empty($request->phno)){
            $phone='';
        }else{
            $phone=$request->phno;
        }
        $profile->phone = $phone;
        $profile->date_of_birth = $request->dob;

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            Image::make($file)->resize(200, 200)->save($file->move('uploads/profilePic', $filename));
            $profile->profilepic_path = $filename;
        }
        $profile->save();  
    /* 
        $userPref = new UserPreference();
        $userPref->user_id = Auth::user()->id;
        $userPref->fullname = Auth::user()->name; */


        /* foreach($request->category as $item){
            $userPref= new UserPreference();
            $userPref->user_id =Auth::user()->id;
            $userPref->category_id = $item; // need to put the array value here
            $userPref->subscription = 1;
            $userPref->save();
      
      } */

        $array_keys = array_keys($request->check);
        $array_values = array_values($request->check);
        
        for($i=0;$i<count($array_keys);$i++){
            $userPref= new UserPreference();
            $userPref->user_id =Auth::user()->id;
            $userPref->category_id = $array_keys[$i]; // need to put the array value here
            $userPref->subscription = $array_values[$i];
            $userPref->save();
            
        }
        
        return redirect()->action([HomeController::class, 'index']);

    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setup $setup)
    {
        //
    }
}
