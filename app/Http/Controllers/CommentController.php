<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
        
        $comment = new Comment;
        $comment->comment = $request->comment_content;
        $comment->user()->associate($request->user());
        // dd($request);
        $forum = Forum::find($request->forum_id);
        $forum->comments()->save($comment);

        /* hualilidefengexian  : Testing out the activity log*/
       
        $user = Auth::user()->id;

        activity()
        ->performedOn($comment)
        ->causedBy($user)
        ->withProperties(['commented' => $request->comment_content, 'forum_id'=>$forum ->id])
        ->log('Commented on forums');

        /* end of testing */

        return back();

        

        //dd(Forum::find($request->forum_id));
        // $comment = new Comment;

        // $comment->comment = $request->comment;

        // $comment->user()->associate($request->user());

        // $forum_post = Forum::find($request->forum_id);

        // $forum_post->comments()->save($comment);

        // return back();
    }

    // public function replyStore(Request $request)
    // {
    //     $reply = new Comment();

    //     $reply->comment = $request->get('comment');

    //     $reply->user()->associate($request->user());

    //     $reply->parent_id = $request->get('comment_id');

    //     $forum_post = Forum::find($request->get('forum_id'));

    //     $forum_post->comments()->save($reply);

    //     return back();

    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //

        $commentlist = Comment::all;
        // $commentCount = $commentlist->count();
        $commentCount = Comment::whereNotNull('forum_id')->count();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
