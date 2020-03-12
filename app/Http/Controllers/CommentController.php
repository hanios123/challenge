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
       //$this->middleware('admin');
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
    public function create(Request $request)
    {
        $challenge = Challenge::findOrFail($request->challege_id);
        return $request->challege_id;
        $comment = Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'challenge_id' => $challenge->id
        ]);

        if ($challenge->user_id != $comment->user_id) {
            $user = User::find($challenge->user_id);
           // $user->notify(new NewCommentPost($comment));
        }

        return redirect()->route('challenge.show', $challenge->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

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
    public function edit(Comment $comment)
    {
        //
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
    public function destroy(Comment $comment)
    {
        //
    }
}
