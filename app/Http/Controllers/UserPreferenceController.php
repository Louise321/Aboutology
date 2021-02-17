<?php

namespace App\Http\Controllers;

use App\Models\UserPreference;
use Illuminate\Http\Request;

class UserPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function show(UserPreference $userPreference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPreference $userPreference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPreference $userPreference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPreference $userPreference)
    {
        //
    }

    public function updatePreferenceStatus(Request $request){
      
   
           if($request->ajax()){
               $data = $request->all();
   
               if($data['status']=="Active"){
                   $status =0;
               }else{
                   $status = 1;
               }
               $userPref = UserPreference::find($data['banner_id']);
               $userPref->subscription =  $status;
               $userPref->save();
   
   
               return response()->json(['success'=>'Status change successfully.','status'=>$status,'banner_id'=>$data['banner_id']]);
   
           } 
}
}