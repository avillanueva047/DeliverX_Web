@extends('layouts.app')

@section('content')
<form action="{{ route('delivery.store') }}" method="POST" name="Add Delivery">
@csrf
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card text-dark bg-white mb-3">
          <div align = "left" class="card-header">
            Add New Delivery
          </div>
          <div class="container-fluid" style="padding-left: 40px; padding-right: 40px; padding-bottom: 30px">
            <div class="card-body">
              <div class="col-md-12">
                  <div class="form-group">
                      <strong>Product</strong>
                      <input type="text" name="delivery_name" class="form-control" placeholder="Enter Product Name" value="{{ old('delivery_name') }}">
                      <span class="text-danger">{{ $errors->first('delivery_name') }}</span>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <strong>Deliver</strong>
                    <select id="deliver_name" class="form-control" name="deliver_name" placeholder="Assign Deliver">
                      @foreach($users as $user)
                       <option value="{{ $user->name }}">{{ $user->name}}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('deliver_name') }}</span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <strong> Client Name</strong>
                    <input type="text" name="client_name" class="form-control" placeholder="Enter Client Name" value="{{ old('client_name') }}">
                    <span class="text-danger">{{ $errors->first('client_name') }}</span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <strong> Client Email</strong>
                    <input type="text" name="client_email" class="form-control" placeholder="Enter Client Email" value="{{ old('client_email') }}">
                    <span class="text-danger">{{ $errors->first('client_email') }}</span>
                </div>
              </div>
              <search-component>
                <span class="text-danger">{{ $errors->first('client_direction') }}</span>
              </search-component>
              <div class="col-md-12">
                <div class="form-group">
                    <strong> Client Phone</strong>
                    <input type="text" name="client_phone" class="form-control" placeholder="Enter Client Phone" value="{{ old('client_phone') }}">
                    <span class="text-danger">{{ $errors->first('client_phone') }}</span>
                </div>
              </div>
              <div class="col-md-12">
                  <button type="submit" class="btn btn-outline-primary">Create Delivery</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
