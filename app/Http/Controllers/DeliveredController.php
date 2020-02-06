<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;
use App\Delivered;

class DeliveredController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Request $request){
      $id = $request->id;
      $delivery = Delivery::where('id', $id)->first();
      $delivered = new Delivered;

      $delivered->user_id = $request->user_id;
      $delivered->delivery_name = $delivery->delivery_name;
      $delivered->deliver_name = $delivery->deliver_name;
      $delivered->client_name = $delivery->client_name;
      $delivered->client_email = $delivery->client_email;
      $delivered->client_direction = $delivery->client_direction;
      $delivered->client_phone = $delivery->client_phone;
      $delivered->latitude = $request->latitude;
      $delivered->longitude = $request->longitude;

      $delivered->save();

      (new DeliveryController)->destroy($request->id);
      return response()->json([
        'message' => 'Delivery handed Successfully!'
      ], 201);
    }
}
