<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PagesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    
    public function index(){
        return view('pages.index');
    }

    public function organisers(){
        $organisers = User::all();
        return view('org.index')->with('organisers', $organisers);
    }

    public function update(Request $request){
        
    }
}
