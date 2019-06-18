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

    //fetches info from database and passes it to the /show view.
    public function show()
    {
        $results = DB::select("select id, name, email, town, created_at from users");
        return view('show', compact('results'));
    }

    //fetches update view and passes along info from the database.
    public function update($id){
        $results = DB::select("select id, name, email, town from users where id = $id");
        return view('update', compact('results'));
    }

    //update user info. redirects to /show/ on succesfull completion
    public function updateValues(Request $request){
        $request->validate(['name' => 'required', 'email'=>'required', 'town'=>'required', 'id'=>'required']);
        $now = Carbon::now();
        DB::update("update users set name = '$request->name', email = '$request->email', town = '$request->town', updated_at = '$now' where id = $request->id");
        return redirect()->route('show');
    }

    //delete user info
    public function delete(Request $request){
        $request->validate(['id'=>'required']);

        DB::delete("delete from users where id = $request->id");
        return redirect()->route('show');
    }
}