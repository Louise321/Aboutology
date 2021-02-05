<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $feedbacks = Article::latest()->paginate(6);
/* 
        return view('administrators.article.index', compact('articles'))
            ->with('i', (request()->input('page',1) - 1) * 5); */

        return view('user.setting');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //User go to setting page to create feedback
        //return view('setting');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        /* if($request->filled('feedbackTitle')) {
            $feedback = new Feedback();
            $feedback->title = $request->feedbackTitle;
            $feedback->description = $request->feedbackContent;
            $feedback->save();
            return back()->with('success', 'Feedback created successfully!');
        } else {
            error_log('Some message here.');        
        }
       */
        //print_r(Auth::id());
        

        if(!empty($request->input('feedbackTitle')) && !empty($request->input('feedbackContent'))) {

            $feedback = new Feedback();
            $feedback->title = $request->feedbackTitle;
            $feedback->description = $request->feedbackContent;
    //      $feedback->response = ;
            $feedback->status = "Opened"; 
            $feedback->created_by = Auth::user()->name;
            $feedback->updated_by = Auth::user()->name;
            $feedback->save();
            return back()->with('success', 'Feedback created successfully!');
            dd('Input is not empty.');

        } else {

            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);

            error_log('Empty input.');   
            /* return back()->with('failed', 'Failed to create feedback!'); */
            return back()->withInput(['tab'=>'Add']);

        }

    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //return view('administrators.feedback', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
            $request->validate([
            'content' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Artcle updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
    //doesnt provide delete function..
    }

    public function getFeedbacks(){
        $feedback = Feedback::all();
        //if you want to get contacts on where condition use below code
        //$contacts = Contact::Where('tenant_id', "1")->get();
        return view('admin.feedback', compact('feedback'));
        }
}
