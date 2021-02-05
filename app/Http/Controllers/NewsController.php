<?php

namespace App\Http\Controllers;

use DB;

use App\Models\News;
use App\Models\Admin;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Constants\GlobalConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * Admin Index
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $news = News::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if(($term = $request->term)) {
                    $query->orWhere('title', 'LIKE', '%'.$term.'%')->get();
                }
            }]
        ])

            ->orderBy("id", "desc")
            ->paginate(10); 
        
            $cat_list = Category::all();
            /*  */
            $selected_id = [];
            $selected_id['category_id'] = $request->category_id;
            /*  */

        return view('administrators.news.index',compact('news','cat_list','selected_id'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * Admin create new news
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        if ($request->checkbox_event == "1") {
            // this news is about an event
            $request->validate([
                'title' => 'required',
                'news_type'=>'required',
                'description' => 'required',
                'file_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'starts_at' => 'required|date|after:tomorrow',
                'ends_at' => 'required|date|after_or_equal:starts_at',
            ]);
            
            if ($request->hasFile('file')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                
                // Save the file locally in the storage/public/ folder under a new folder named /images
                $news = $request->file->store('public/images');
                $news->save(); // Finally, save the record.
            }

            $news = new News();
            $news->title = $request->title;
            $news->news_type = $request->news_type;
            $news->description = $request->description;
            $news->eventStartDate =  $request->starts_at;
            $news->eventEndDate =  $request->ends_at;


            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/image', $filename);
                $news->file_path = $filename;
            } else {
                 return $request; 
                $news->file_path = '';
            }
          
            $news->save();
           
            return back()->with('success', 'News created successfully!'); 
           

        }else{
            // this news is not event

            $request->validate([
                'title' => 'required',
                'news_type'=>'required',
                'file_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
            ]);
            
            if ($request->hasFile('file')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                // Save the file locally in the storage/public/ folder under a new folder named /images
                $news = $request->file->store('public/images');
                $news->save(); // Finally, save the record.
            }

            $news = new News();
            $news->title = $request->title;
            $news->news_type = $request->news_type;
            $news->description = $request->description;
            
            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/image', $filename);
                $news->file_path = $filename;
            } else {
                 return $request;
                 $news->file_path = '';
            }

            $news->save();
 
            return back()->with('success', 'News created successfully!'); 
        } 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('id', $id)->first();

        $order = 'desc';
        $data = News::where('id', '!=' , ($news->id))->orderBy('id', $order)->limit(3)->get();
        return view('administrators.news.show', compact('news','data')); 
    }

    public function create()
    {

        return view('administrators.news.create');
    }



/**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function userDetailShow($id)
    {
        $news = News::where('id', $id)->first();

        $order = 'desc';
        $data = News::where('id', '!=' , ($news->id))->orderBy('id', $order)->limit(3)->get();

        return view('user.newsdetails', compact('news','data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('administrators.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->not_event == "99"){

            $request->validate([
                'title' => 'required',
                'news_type'=>'required',
                'description' => 'required',
            ]);
            
            $news = News::find($id);
            $news->title = $request->title;
            $news->news_type = $request->news_type;
            $news->description = $request->description;
            $news->eventStartDate = null;
            $news->eventEndDate = null;

            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/image', $filename);
                $news->file_path = $filename;
            }

            $message = $news->isDirty() ? "News updated successfully!" : "No data changed";
            $news->save();
            return back()->with('updated', $message);


        }else if($request->checkbox_event == "1"){

            $request->validate([
                'title' => 'required',
                'news_type'=>'required',
                'description' => 'required',
                'starts_at' => 'required|date|after:tomorrow',
                'ends_at' => 'required|date|after_or_equal:starts_at',
            ]);

            $news = News::find($id);
            $news->title = $request->title;
            $news->news_type = $request->news_type;
            $news->description = $request->description;
            $news->eventStartDate =  $request->starts_at;
            $news->eventEndDate =  $request->ends_at;

            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/image', $filename);
                $news->file_path = $filename;
            }

            $message = $news->isDirty() ? "News updated successfully!" : "No data changed";
            $news->save();
            return back()->with('updated', $message);
            
        }else{
          
            /* Satrt inner ifelse */

            if ($request->starts_at != null) {
                // this news is about an event
                $request->validate([
                    'title' => 'required',
                    'news_type'=>'required',
                    'description' => 'required',
                    'starts_at' => 'required|date|after:tomorrow',
                    'ends_at' => 'required|date|after_or_equal:starts_at',
                ]);
    
                $news = News::find($id);
                $news->title = $request->title;
                $news->news_type = $request->news_type;
                $news->description = $request->description;
                $news->eventStartDate =  $request->starts_at;
                $news->eventEndDate =  $request->ends_at;
    
    
                if ($request->hasFile('file_path')) {
                    $file = $request->file('file_path');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('uploads/image', $filename);
                    $news->file_path = $filename;
                }
              
                $message = $news->isDirty() ? "News updated successfully!" : "No data changed";
                $news->save();
                return back()->with('updated', $message);
               
    
            }else{
                // this news is not event
    
                $request->validate([
                    'title' => 'required',
                    'news_type'=>'required',
                    'description' => 'required',
                ]);
    
                $news = News::find($id);
                $news->title = $request->title;
                $news->news_type = $request->news_type;
                $news->description = $request->description;
                
                if ($request->hasFile('file_path')) {
                    $file = $request->file('file_path');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('uploads/image', $filename);
                    $news->file_path = $filename;
                }

                $message = $news->isDirty() ? "News updated successfully!" : "No data changed";
                $news->save();
                return back()->with('updated', $message);
            } 

            /* End inner ifelse */
        }
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index')
            ->with('deleted', 'News deleted successfully');
    }

    public function getMoreUsers(Request $request) {

        $query = $request->term;
        $category = $request->category;

        if($request->ajax()) {
            $news = News::getUsers($query, $category);
                return view('administrators.news.sample.news_page', compact('news'))->render();
        }
    }


    /**
     * Display a listing of the resource.
     *
     * User - News
     * 
     * @return \Illuminate\Http\Response
     */
    public function userNewspage(Request $request)
    {
/*         $news = News::all()->orderBy('id', 'desc');;
 */        $order = 'desc';
        $news = News::orderBy('id', $order)->get();
        return view('user.news',compact('news'));
    }

    /**
     * Display a listing of the resource.
     *
     * User - Go to specific newsID page
     * 
     * @return \Illuminate\Http\Response
     */
    public function userDetailNewspage($id)
    {
        $news = News::where('id', $id)->first();

        $order = 'desc';
        $relatednews = News::where('id', '!=' , ($news->id))->orderBy('id', $order)->limit(3)->get();
        return view('user.newsdetails', compact('news','relatednews')); 

    }


}
