<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShowController extends Controller
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
    public function show()
    {
        $results = DB::select("select id, name, email, town from users");
        return view('show', compact('results'));
    }

    public function update($id){
        $results = DB::select("select id, name, email, town from users where id = $id");
        return view('update', compact('results'));
    }

    public function updateValues(Request $request){
        $request->validate(['name' => 'required', 'email'=>'required', 'town'=>'required', 'id'=>'required']);
        DB::update("update users set name = '$request->name', email = '$request->email', town = '$request->town' where id = $request->id");
        return redirect()->route('show');
    }
}