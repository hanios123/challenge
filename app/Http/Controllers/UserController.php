<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index',['users'=>User::where('id','!=',Auth::user()->id)->latest()->paginate(10)]);

    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request)
    {
        try {
            if(isset($request->auth)){
                User::where('id',$request->user_id)->update(['auth'=>$request->auth]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail','Sorry a problem has been occured!');
        }
        return redirect()->back()->with('success','Succesfuly update user auth!');
    }
}
