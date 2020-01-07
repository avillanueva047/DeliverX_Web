<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;
use App\User;
use Redirect;

class DeliveryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['deliveries'] = Delivery::orderBy('id')->paginate(10);
        return view('delivery.deliveries', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        return view('delivery.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'delivery_name' => 'required',
            'deliver_name' => 'required',
            'client_name' => 'required',
            'client_email' => 'required | email',
            'client_direction' => 'required',
            'client_phone' => 'required | regex:/[0-9]{9}/',
        ]);

        Delivery::create($request->all());

        return redirect()->route('admin.deliveries');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['delivery_info'] = Delivery::where($where)->first();

        return view('delivery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'delivery_name' => 'required',
          'deliver_name' => 'required',
          'client_name' => 'required',
          'client_email' => 'required|email',
          'client_direction' => 'required',
          'client_phone' => 'required | regex:/[0-9]{9}/',
        ]);

        $update = ['delivery_name' => $request->delivery_name, 'deliver_name' => $request->deliver_name,
                  'client_name' => $request->client_name, 'client_email' => $request->client_email,
                  'client_direction' => $request->client_direction, 'client_phone' => $request->client_phone];
        Delivery::where('id', $id)->update($update);

        return Redirect::to('admin/current-deliveries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Delivery::where('id', $id)->delete();

          return Redirect::to('admin/current-deliveries');
    }
}
