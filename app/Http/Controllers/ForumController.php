<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Forum;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{

    public function __construct()
    {
        //    $this->middleware('auth');

        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // $forums = Forum::where([
        //     ['title', '!=', Null],
        //     [function ($query) use ($request) {
        //         if(($term = $request->term)) {
        //             $query->orWhere('title', 'LIKE', '%'.$term.'%')->get();
        //         }elseif(($term = $request->category_id)) {
        //             $query->orWhere('category_id', '=', $term)->get();
        //         }

        //     }]
        // ])

        //     ->orderBy("id", "desc")
        //     ->paginate(10);

        // $data = DB::table('categories')->get();
        
        // $cat = Forum::with(['category'])->filterBy(request()->all())->get();
    
        // $cat_list = Category::all();
        // /*  */
        // $selected_id = [];
        // $selected_id['category_id'] = $request->category_id;
        // /*  */

        // return view('user.forum', compact('forums', 'data', 'cat','cat_list','selected_id'))
        //     ->with('i', (request()->input('page',1) - 1) * 5);

        $forums = Forum::latest()->paginate(6);

        $data = Forum::orderBy('id', 'desc')
                    ->limit(3)
                    ->get();

        $cat = Forum::with(['category'])->filterBy(request()->all())->get();
        
        // $data = Article::orderBy('id', 'desc')->limit(3)->get();

        return view('user.forum', compact('forums' , 'data', 'cat'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Forum::with(['category'])->filterBy(request()->all())->get();

        $cat_list = Category::all();

        return view('user.forumcreate', compact('cat', 'cat_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'category_id' => 'required',
    //         'content' => 'required',
    //     ]);


    //     if ($request->hasFile('file')) {

    //         $request->validate([
    //             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //         ]);
            
    //         // Save the file locally in the storage/public/ folder under a new folder named /images
    //         $forum = $request->file->store('public/images');
    //         $forum->save(); // Finally, save the record.
    //     }
         
    //     $forum = new Forum();
    //     $forum->title = $request->title;
    //     $forum->user_id = Auth::user()->id; // ask this one
    //     $forum->user_name = Auth::user()->name;
    //     $forum->category_id = $request->category_id;
    //     $forum->content = $request->content;

    //     if ($request->hasFile('file_path')) {
    //         $file = $request->file('file_path');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('uploads/image', $filename);
    //         $forum->file_path = $filename;
    //     } else {
    //         return $request;
    //         $forum->file_path = '';
    //     }

    //     $forum->save();

    //     return back()->with('success', 'Forum has created successfully!');
        
    //     // $forum =  new Forum;
    //     // $forum->title = $request->get('title');
    //     // $forum->content = $request->get('content');

    //     // $forum->save();

            
    //     // $user = Auth::user()->id;

    //     // activity()
    //     // ->performedOn($forum)
    //     // ->causedBy($user)
    //     // ->withProperties(['created' =>$forum ->id])
    //     // ->log('createdForum');

    //     // return redirect('forums');
        

      

    // }

    public function store(Request $request)
    {
        

        if ($request->hasFile('file_path')) {

            $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'content' => 'required',
            ]);
    
            if ($request->hasFile('file')) {
    
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                
                // Save the file locally in the storage/public/ folder under a new folder named /images
                $forum = $request->file->store('public/images');
                $forum->save(); // Finally, save the record.
            }

            $forum = new Forum();
            $forum->title = $request->title;
            $forum->user_id = Auth::user()->id; // ask this one
            $forum->user_name = Auth::user()->name;
            $forum->category_id = $request->category_id;
            $forum->content = $request->content;

            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image', $filename);
            $forum->file_path = $filename;

            $forum->save(); 

            return back()->with('success', 'Forum has created successfully!');
        }
        else{

            $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'content' => 'required',
            ]);

            $forum = new Forum();
            $forum->title = $request->title;
            $forum->user_id = Auth::user()->id; // ask this one
            $forum->user_name = Auth::user()->name;
            $forum->category_id = $request->category_id;
            $forum->content = $request->content;
            $forum->save(); 

            return back()->with('success', 'Forum has created successfully!');
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // return view('forum.single',compact('forum'));
        // $forum = Forum::find($id);

        // return view('user.forumdetails', compact('forum'));

        $forum = Forum::where('id', $id)->first();


        return view('user.forumdetails', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
        $forum = Forum::findOrFail($id);

        $cat = Forum::with(['category'])->filterBy(request()->all())->get();
        $cat_list = Category::all();
        // $testing123 = Article::Where('category_id', $id)->get();

        return view('user.forumedit', compact('forum', 'cat', 'cat_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
