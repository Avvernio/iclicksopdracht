<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Http\Request;

class AddController extends Controller
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
    public function add()
    {
        return view('add');
    }

    public function store(Request $request){
        $request->validate(['name' => 'required', 'email'=>'required', 'town'=>'required', 'password'=>'required|max:191', 'password_confirmation'=>'required|max:191']);
        $date = Carbon::now();

        $password = Hash::make($request->password);

        if($request->password == $request->password_confirmation) {
            if(DB::select("select * from users where email = ?", [$request->email]) == false) {
                DB::insert("insert into users (name, password, email, town, created_at, updated_at) values ('$request->name', '$password', '$request->email', '$request->town', '$date', '$date')");
            }else{
                return back()->withErrors(['msg'=>'Error email is already taken']);
            }
        }else{
            //set error message
            return back()->withErrors(['msg'=>'Error passwords do not match']);
        }

        return back();
    }
}
