<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{

    public function __construct(Challenge $challenge)
    {
        $this->middleware('auth');
        $this->challenge = $challenge;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('challenge.index',['challenges'=>Challenge::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  Challenge::crea
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    public function view($id)
    {
        $challenge = Challenge::where('id', $id)->first();
        return view('challenge.view',compact('challenge'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Challenge::where('id', $request->id)->delete();
        return back()->with('positive', 'challenge is removed');
    }
}
