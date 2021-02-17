<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Forum;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        return view('administrators.forum.index', compact('forum', 'data', 'cat','cat_list','selected_id'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

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

    public function create()
    {
        $cat = Forum::with(['category'])->filterBy(request()->all())->get();

        $cat_list = Category::all();

        return view('administrators.forum.create', compact('cat', 'cat_list'));
    }

    public function edit($id)
    {
        $forum = Forum::findOrFail($id);

        $cat = Forum::with(['category'])->filterBy(request()->all())->get();
        $cat_list = Category::all();
        // $testing123 = Article::Where('category_id', $id)->get();

        return view('administrators.forum.edit', compact('forum', 'cat', 'cat_list'));
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

    public function destroy($id)
    {
        $forum = Forum::find($id);
        $forum->delete();

        return redirect()->route('aforum.index')
            ->with('deleted', 'Forum deleted successfully');
    }

    public function category($id)
    {
        $forum = Forum::latest()->paginate(6);

        $data = Forum::orderBy('id', 'desc')
                    ->limit(3)
                    ->get();
                    
        $testing123 = Forum::Where('category_id', $id)->get();

        $cat = Forum::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']); 
        $cat_id = $id;
        $cat_list = Category::all();

        $myforum = Forum::where('user_id', Auth::user()->id)->get();

        return view('user.forumcat', compact('forum', 'data', 'cat','testing123','cat_id', 'myforum', 'cat_list'));
    }
}
