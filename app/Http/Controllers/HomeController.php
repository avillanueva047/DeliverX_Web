<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Delivery;

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

    public function show($id)
    {
      return User::find($id);
    }
}
