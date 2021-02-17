<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $userRecord = User::findOrFail($id);
        $userRecord->delete();

        return redirect()->route('admin.setting')
            ->with('deleted', 'User deleted successfully');
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->fullname = $request->name;
        $profile->short_desc = $request->desc;
        $profile->date_of_birth = $request->dob;
        $profile->phone = $request->phone;

        $file = $request->file('profilepic_path');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/profilePic', $filename);
        $profile->profilepic_path = $filename;

        $message = $profile->isDirty() ? "Profile updated successfully!" : "No data changed";  
        
        $profile->save();
        $file = $request->file('profilepic_path');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/profilePic', $filename);
        $profile->profilepic_path = $filename;

        $message = $profile->isDirty() ? "Profile updated successfully!" : "No data changed";  
        
        $profile->save();

        return back()->with('updated', $message);
        
    }
   


}
