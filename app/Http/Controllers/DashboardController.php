<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('pages.index', 'events.show', 'events.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $organiser = User::find($user_id);
        return view('pages.dashboard')->with('organiser', $organiser);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'nullable|string',
            'studentCode' => 'nullable|integer',
        ]);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $name = $user->name;
        $studentCode = $user->studentCode;


        if($request->filled('name')){
            $name = $request->input('name');
        }

        if($request->filled('studentCode')){
            $studentCode = $request->input('studentCode');
        }

        $user->name = $name;
        $user->studentCode = $studentCode;
        
        $result = $user->save();

        if($result){
            return redirect('/dashboard')->with('success', 'Account Updated!');
        }
        else{
            return redirect('/dashboard')->with('error', 'Account Not Updated!');
        }
    }
}
