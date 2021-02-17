<?php

namespace App\Http\Controllers;


use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BannersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $banners = Banner::orderBy("id", "desc")
        ->paginate(10); 

        return view('administrators.banners.index')->with(compact('banners'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrators.banners.add_banner');

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
            'title' => 'required',
            'link'=>'required',
            'alt' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;	

    		$banner = new Banner;
			$banner->title = $data['title'];
			$banner->link = $data['link'];
			$banner->alt = $data['alt'];

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

			// Upload Image
             if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = time().'-'.rand(111,99999).'.'.$extension;
                    $image_tmp->move('uploads/banners_image', $filename);
                    $banner->image = $filename;
                }
            } 

            $banner->status = $status;
			$banner->save();
			return redirect()->back()->with('flash_message_success', 'Banner has been added successfully');
    	}
    	
        return view('administrators.banners.add_banner');

    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Banner  $banner
     */
    public function show(Banner $banner)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $bannerDetails = Banner::findOrFail($id);
        return view('administrators.banners.edit_banner', compact('bannerDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'link'=>'required',
            'alt' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->link = $request->link;
        $banner->alt = $request->alt;
        if(empty($request->status)){
            $status='0';
        }else{
            $status='1';
        }
        $banner->status = $status;
        
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = time().'-'.rand(111,99999).'.'.$extension;
                $image_tmp->move('uploads/banners_image', $filename);
                $banner->image = $filename;
            }
        } 
        $message = $banner->isDirty() ? "Banner updated successfully!" : "No data changed";
        $banner->save();
        return redirect()->back()->with('flash_message_success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner )
    {
      //Delete Banner from banner table
      $banner->delete();
      return redirect()->back()->with('flash_message_success', 'Banner deleted successfully!');
    }
    public function updateBannerStatus(Request $request){
     /*    error_log($request);
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status =0;
            }else{
                $status = 1;
            }

            Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status],['banner_id'=>$data['banner_id']]);
        } */

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status =0;
            }else{
                $status = 1;
            }
            $banner = Banner::find($data['banner_id']);
            $banner->status =  $status;
            $banner->save();


            return response()->json(['success'=>'Status change successfully.','status'=>$status,'banner_id'=>$data['banner_id']]);

        } 

/* 
        $banner = Banner::find($request->banner_id);

        if ($request->status == "0"){
            $status = 1;

        }else{
            $status = 0;
        }
        
        $banner->status =  $status;


        $banner->save();
        return response()->json(['status'=>$status],['banner_id'=>$data['banner_id']); */

    }


}
