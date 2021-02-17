<?php

namespace App\Http\Controllers;
use DB;
use App\Models\HelpCenter;
use App\Models\Forum;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;


class HelpCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hcenter=HelpCenter::all();
        /* Forum Comment Count */
       /*  $forumCount = Forum::join('comments', 'forums.id', 'comments.commentable_id')
        ->select([
           'forums.*', 
            DB::raw('(SELECT COUNT(*) FROM comments WHERE comments.commentable_id = forums.id) as comment_count')
        ])->groupBy('forums.id'); */

        //dashboard
        $tests = Comment::latest()->with('commentable')->count();

        $commentCount = Comment::with(['forum' => function ($q) {
            $q->withCount('comments');
        }]);

        return view('user.helpcenter', compact('hcenter','tests','commentCount'));
            
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
     * @param  \App\Models\HelpCenter  $helpCenter
     * @return \Illuminate\Http\Response
     */
    public function show(HelpCenter $helpCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HelpCenter  $helpCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpCenter $helpCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HelpCenter  $helpCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HelpCenter $helpCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HelpCenter  $helpCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpCenter $helpCenter)
    {
        //
    }
}
