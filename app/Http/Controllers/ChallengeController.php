<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\ChallengeUser;
use App\Comment;
use App\Http\Requests\ChallengeRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('organizer');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChallengeRequest $request)
    {
          Challenge::create(['title'=>$request->title ,
          'description'=>$request->description ,
          'deadline'=>$request->deadline ,'title'=>$request->title,
          'organizer_id'=>Auth::user()->id]);
          return back()->with('success', 'challenge is created');
    }


    public function edit(ChallengeRequest $request,$id)
    {
        Challenge::where('id',$id)->update(['title'=>$request->title ,
        'description'=>$request->description ,
        'deadline'=>$request->deadline ,'title'=>$request->title,'status'=>$request->status]);
        return back()->with('success', 'challenge is updated');
    }

    public function view($id)
    {
        $challenge = Challenge::where('id', $id)->first();
        return isset($challenge)? view('challenge.view',compact('challenge')):abort(404);
    }

    public function destroy($id)
    {
        ChallengeUser::where('challenge_id', $id)->where('user_id', Auth::user()->id)->delete();
        Challenge::where('id', $id)->delete();
        return back()->with('success', 'challenge is removed');
    }

    public function participate($id){
        return view('challenge.participate');
    }
}
