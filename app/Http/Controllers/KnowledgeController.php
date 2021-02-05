<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
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
    public function index()
    {
        return view('user.knowledge');
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
        
        $posts = News::query()
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
        return view('user.knowledgesearch', compact('posts'));
        
    }

    public function destroy(Knowledge $knowledge)
    {
        //
    }
}
