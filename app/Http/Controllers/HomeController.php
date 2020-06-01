<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Delivery;
use App\Delivered;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getDeliveries($id)
    {
      $user = User::find($id);
      $deliveries = Delivery::where('deliver_name', $user->name)->get();
      return $deliveries;
    }

    public function getDelivered($id)
    {
      $deliveries = Delivered::where('user_id', $id)->get();
      return $deliveries;
    }

    public function changePassword(Request $request){
      $id =  $request->id;
      $user = User::where('id', $id)->first();

      if(Hash::check($request->current_password, $request->password)){
        $update = ['password' => Hash::make($request->new_password)];
        User::where('id', $id)->update($update);
      }

      return response()->json([
        'message' => 'Password changed Successfully!'
      ], 201);
    }

    public function show($id)
    {
      return User::find($id);
    }
}
