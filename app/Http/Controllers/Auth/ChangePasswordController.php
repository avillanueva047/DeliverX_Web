<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instace.
     *
     * @return void
     */
     public function __construct(){
       $this->middleware('auth:admin');
     }

     /**
     * Show the application dashboard
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(){
       return view('auth.changePassword');
     }

     public function store(Request $request){
       $request->validate([
         'current_password' => ['required', new MatchOldPassword],
         'new_password' => ['required'],
         'new_confirm_password' => ['same:new_password'],
       ]);

       Admin::find(Auth::user()->id)->update(['password'=>Hash::make($request->new_password)]);

       return view('/admin');
     }
}
