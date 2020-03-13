<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Comment;
use App\Http\Requests\CommentRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


   public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('participant');
   }

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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
       // $challenge = Challenge::findOrFail($request->challenge_id);
        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'challenge_id' => $request->challenge_id
        ]);

        // if ($challenge->user_id != $comment->user_id) {
        //     $user = User::find($challenge->user_id);
        //    // $user->notify(new NewCommentPost($comment));
        // }


        return  back()->with('success', 'comment is posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentRequest $comment,$id)
    {
        Comment::where('id',$id)->update([
            'content' => $comment->content
        ]);
        return  back()->with('success', 'comment is update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id',$id)->delete();
        return  back()->with('success', 'comment is deleted');
    }
}
