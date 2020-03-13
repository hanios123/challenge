<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\ChallengeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('organizer');
        $this->middleware('participant', ['except' => ['winner']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('participant.index',['participants'=>(Challenge::find($id)!=null?Challenge::find($id)->users()->paginate(10):collect())]);
    }


    public function winner(Request $request,$id){
        $request->validate([
            'rank' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        ChallengeUser::where('id',$id)->update(['rank'=>$request->rank,'title'=>$request->title,'description'=>$request->description,'isWinner'=>true]);
        return back()->with('success','winner is update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'code' => 'required',
        ]);
        ChallengeUser::create(['user_id'=>Auth::user()->id,'challenge_id'=>$id,'code'=>$request->code]);
        return  redirect()->route('challenge.index')->with('success','your participation has been sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $code = ChallengeUser::find($id)->code;
        return view('participant.code_view',compact('code'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
