<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Knowledge;
use App\Models\Article;
use App\Models\Forum;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $article = Article::all();
        // $forum = Forum::all();
        // $news = News::all();

        $article = Article::orderBy('id', 'desc')
                    ->limit(3)
                    ->get();
        
        // $forum = Forum::orderBy('id', 'desc')
        //             ->limit(3)
        //             ->get();

        $forum = DB::table('forums')
            ->join('users','forums.user_id','=','users.id')
            ->join('profiles','users.id','=','profiles.user_id')
            ->select('forums.*','profiles.profilepic_path as pic') 
            ->latest()
            ->paginate(3);
        
        $forumCount = Forum::select(\DB::raw("COUNT(*) as count"));

        // $total = Forum::withCount('id')->get();
    
        $news = News::orderBy('id', 'desc')
                    ->limit(3)
                    ->get();


        return view('user.knowledge', compact('article', 'forum', 'news', 'forumCount'));
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
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledge $knowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function edit(Knowledge $knowledge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->get('search');

        // Search in the title and body columns from the posts table
        
        $article = Article::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

/* 
$test = DB::table('forums')
            ->join('users','forums.user_id','=','users.id')
            ->join('profiles','users.id','=','profiles.user_id')
            ->select('forums.*','profiles.profilepic_path as pic') 
            ->latest()
            ->paginate(3);

*/

     /*    $forum = Forum::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();
 */

        $forum = DB::table('forums')
        ->join('users','forums.user_id','=','users.id')
        ->join('profiles','users.id','=','profiles.user_id')
        ->select('forums.*','profiles.profilepic_path as pic') 
        ->where('title', 'LIKE', "%{$search}%")
        ->get();

   
       
        $news = News::query()
            ->where('title', 'LIKE', "%{$search}%")
            // ->orWhere('category', 'LIKE', "%{$search}%")
            ->get();
        

            /* hualilidefengexian  : Testing out the activity log*/
            $knowledge = new Knowledge();
            $user = Auth::user()->id;

            activity()
            ->performedOn($knowledge)
            ->causedBy($user)
            ->withProperties(['searchFor' => $search])
            ->log('Search query');

            /* end of testing */


        // Return the search view with the resluts compacted
        return view('user.knowledgesearch', compact('article', 'forum', 'news'));
        
    }

    public function destroy(Knowledge $knowledge)
    {
        //
    }
}