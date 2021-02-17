<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Forum;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
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
        
       // $forums = Forum::latest()->paginate(6); 

        // $forumUpic = Forum::join('profiles', 'profiles.user_id', '=', 'forums.user_id')
        //         ->select('profiles.*')
        //         ->get();

        /* take profile pic */
        $forums = DB::table('forums')
            ->join('users','forums.user_id','=','users.id')
            ->join('profiles','users.id','=','profiles.user_id')
            // ->join('comments', 'forums.id', '=', 'comments.commentable_id')
            // ->select('forums.*','comments.commentable_id as com')
            ->select('forums.*','profiles.profilepic_path as pic') 
            ->latest()
            ->paginate(6);
        
        $data = Forum::orderBy('views', 'desc')
                    ->limit(3)
                    ->get();
        
        // $test = Forum::where('id', $id)->pluck('category_id')->first();
        
        // $relatedpost = Forum::where('category_id',$test)
        //     ->where('id', '!=', $id)
        //     ->take(3)
        //     ->get();

        $cat = Forum::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']); 
        // $cat = Forum::with(['category'])->filterBy(request()->all())->get();
        $cat_list = Category::all();
        /*  */
        $selected_id = [];
        $selected_id['category_id'] = $request->category_id;              

        $myforum = Forum::where('user_id', Auth::user()->id)
            ->latest()
            ->paginate(6);

        // $forum = Forum::where('id', $id)->first();

        // $commentCount = Comment::where('commentable_id', $id)->count();

        // $commentCount = DB::table('comments')
        //     ->join('forums','comments.commentable_id','=','forums.id')
        //     ->select('forums.id', DB::raw('count(comments.commentable_id) as commentCount'))
        //     ->groupBy('forums.id')
        //     ->orderByDesc('forums.id')
        //     ->get();
           

        // $forumComment = DB::table('forums')
        //     ->leftJoin('comments', 'forums.id', '=', 'comments.commentable_id')
        //     ->select('forums.id', DB::raw('count(comments.commentable_id) as commentCount'))
        //     ->groupBy('forums.id')
        //     ->orderByDesc('forums.id')
        //     ->get();

        
        // $test = DB::select('SELECT forums.id, COUNT(comments.commentable_id) AS commentCount FROM `forums` LEFT JOIN `comments` ON (comments.commentable_id = forums.id) GROUP BY forums.id ORDER BY forums.id');
           /*  dd($forumComment); */

        return view('user.forum', compact('forums' , 'data', 'myforum', 'cat', 'cat_list', 'selected_id'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function aindex(Request $request)
    {
        $forum = Forum::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if(($term = $request->term)) {
                    $query->orWhere('title', 'LIKE', '%'.$term.'%')->get();
                }elseif(($term = $request->category_id)) {
                    $query->orWhere('category_id', '=', $term)->get();
                }

            }]
        ])

            ->orderBy("id", "desc")
            ->paginate(10);

        $data = DB::table('categories')->get();
        
        $cat = Forum::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']);
        $cat_list = Category::all();
        /*  */
        $selected_id = [];
        $selected_id['category_id'] = $request->category_id;
        /*  */

        return view('administrators.forum.aforum', compact('forum', 'data', 'cat','cat_list','selected_id'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Ill

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


            /* Create log  */

            $user = Auth::user()->id;

            activity()
            ->performedOn($forum)
            ->causedBy($user)
            ->withProperties(['forum_title' => $request->title])
            ->log('createdForum');
    
            /* end of testing */

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

              /* Create log  */

              $user = Auth::user()->id;

              activity()
              ->performedOn($forum)
              ->causedBy($user)
              ->withProperties(['forum_title' => $request->title])
              ->log('createdForum');
      
              /* end of testing */

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

        $forumKey = 'forum_' . $forum->id;

        if(!Session::has($forumKey)) {
            $forum->increment('views');
            Session::put($forumKey, 1);
        }

        $abc =  Forum::where('id', $id)->pluck('category_id')->first();
        $relatedpost = Forum::where('category_id',$abc)
            ->where('id', '!=', $id)
            ->take(3)
            ->get();
        
        $commentCount = Comment::where('commentable_id', $id)->count();

        $commentPic = DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->join('profiles','users.id','=','profiles.user_id')
            ->select('comments.*','users.name','profiles.profilepic_path as pic')
            ->where('comments.commentable_id','=',$id)
            ->get();

        return view('user.forumdetails', compact('forum' ,'abc' ,'relatedpost', 'commentPic','commentCount'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $forum = Forum::findOrFail($id);

        $cat = Forum::with(['category'])->filterBy(request()->all())->get();
        $cat_list = Category::all();
        // $testing123 = Article::Where('category_id', $id)->get();

        return view('user.forumedit', compact('forum', 'cat', 'cat_list'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $forum = Forum::find($id);
        $forum->title = $request->title;
        $forum->category_id = $request->category_id;
        $forum->content = $request->content;

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image', $filename);
            $forum->file_path = $filename;
        } 

        $message = $forum->isDirty() ? "Forum updated successfully!" : "No data changed";  
        
        $forum->save();

        return back()->with('updated', $message);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Forum $forum)
    // {
    //     //
    // }

    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->delete();

        return redirect()->route('forums.index')
            ->with('deleted', 'Forum deleted successfully');
    }

    public function category($id)
    {
        $forum = Forum::latest()->paginate(6);

        $data = Forum::orderBy('views', 'desc')
                    ->limit(3)
                    ->get();
                    
        $testing123 = Forum::Where('category_id', $id)
            ->join('users','forums.user_id','=','users.id')
            ->join('profiles','users.id','=','profiles.user_id')
            ->select('forums.*','profiles.profilepic_path as pic') 
            ->latest()
            ->paginate(6);
        
        $cat = Forum::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']); 
        $cat_id = $id;
        $cat_list = Category::all();

        $myforum = Forum::where('user_id', Auth::user()->id)
            ->latest()
            ->paginate(6);

        return view('user.forumcat', compact('forum', 'data', 'cat','testing123','cat_id', 'myforum', 'cat_list'));
    }

    // public function commentCount($id)
    // {

    //     $forum = Forum::where('id', $id)->first();
        
    //     $commentCount = Comment::where('commentable_id', $id)->count();

    //     return view('user.forumdetails', compact('forum' ,'abc' ,'relatedpost', 'commentPic','commentCount'));
    // }

    // public function myforum(Forum $forum)
    // {
    //     $currentUser = auth()->user();
    //     $myforum = DB::table('forums')->where('user_id', $currentUser->id)->get();

    //     return view('user.forum', compact('cat', 'cat_list'));
        
    // }


    
}
