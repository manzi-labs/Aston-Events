<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OrganisersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){
        $organisers = User::all();
        return view('org.index')->with('organisers', $organisers);
    }

    public function show($id){
        $organiser = User::find($id);
        return view('org.show')->with('organiser', $organiser);
    }
}
