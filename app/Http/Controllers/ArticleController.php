<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Likable;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::where([
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
        
        $cat = Article::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']);
        $cat_list = Category::all();
        /*  */
        $selected_id = [];
        $selected_id['category_id'] = $request->category_id;
        /*  */
        return view('administrators.article.index', compact('articles', 'data', 'cat','cat_list','selected_id'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function uindex()
    {
        $article = Article::latest()->paginate(6);

        //recent post

        $data = Article::orderBy('views', 'desc')
                    ->withLikes()
                    ->limit(3) 
                    ->get();

        $cat = Article::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']);
        
        // $data = Article::orderBy('id', 'desc')->limit(3)->get();

        return view('user.article', compact('article' , 'data', 'cat'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function udetails($id)
    {

        $article = Article::where('id', $id)->first();

        // Article::find($id)->increment('views');

        // $viewed = Session::get('views', []);
        // if (!in_array($article->$id, $viewed)) {
        //     $article = Article::find($id)->increment('views');
        //     Session::push('views', $article->$id);
        // }

        $abc =  Article::where('id', $id)->pluck('category_id')->first();
        $relatedpost = Article::where('category_id',$abc)
            ->where('id', '!=', $id)
            ->take(3)
            ->get();

        $articleKey = 'article_' . $article->id;

        if(!Session::has($articleKey)) {
            $article->increment('views');
            Session::put($articleKey, 1);
        }
      
        return view('user.articledetails', compact('article','abc', 'relatedpost'));

    }

    public function category($id)
    {
        $articles = Article::latest()->paginate(6);

        $data = Article::orderBy('views', 'desc')
                    ->withLikes()
                    ->limit(3)
                    ->get();

        $cat = Article::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']);
        
        $testing123 = Article::Where('category_id', $id)->get();
        $cat_id = $id;
        return view('user.category', compact('articles', 'data', 'cat','testing123','cat_id'));
    }

    public function acategory($id)
    {
        if ($request->get('category_id') == '0' || $request->get('caategory_id') == '1') {
            $instance->where('status', $request->get('status'));
        }

        $article = Article::latest()->paginate(6);

        $data = Article::orderBy('id', 'desc')
                    ->withLikes()
                    ->limit(3)
                    ->get();

        $cat = Article::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']);
        
        $testing123 = Article::Where('category_id', $id)->get();
        
        return view('administrators.article.category', compact('article', 'data', 'cat','testing123'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Article::with(['category'])->filterBy(request()->all())->distinct()->get(['category_id']);

        $cat_list = Category::all();

        return view('administrators.article.create', compact('cat', 'cat_list'));
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
            'category_id' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            
            // Save the file locally in the storage/public/ folder under a new folder named /images
            $article = $request->file->store('public/images');
            $article->save(); // Finally, save the record.
        }
         
        $article = new Article();
        $article->title = $request->title;
        $article->user_id = '4'; //Auth:user()->id
        $article->category_id = $request->category_id;
        $article->description = $request->description;

        // get image and store

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image', $filename);
            $article->file_path = $filename;
        } else {
            return $request;
            $article->file_path = '';
        }

        $article->save();

        return back()->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->first();

        $abc =  Article::where('id', $id)->pluck('category_id')->first();
        $relatedpost = Article::where('category_id',$abc)
            ->where('id', '!=', $id)
            ->take(3)
            ->get();

        return view('administrators.article.show', compact('article', 'relatedpost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        $cat = Article::with(['category'])->filterBy(request()->all())->get();
        $cat_list = Category::all();
        // $testing123 = Article::Where('category_id', $id)->get();

        return view('administrators.article.edit', compact('article', 'cat', 'cat_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $article = Article::find($id);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->description = $request->description;

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image', $filename);
            $article->file_path = $filename;
        } 

        $message = $article->isDirty() ? "Article updated successfully!" : "No data changed";  
        
        $article->save();

        return back()->with('updated', $message);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('deleted', 'Article deleted successfully');
    }
  
}
