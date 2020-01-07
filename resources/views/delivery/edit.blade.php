@extends('layouts.app')

@section('content')

<form action="{{ route('delivery.update', $delivery_info->id) }}" method="POST" name="Edit Delivery">
@csrf
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card text-dark bg-white mb-3">
        <div align = "left" class="card-header">
          Edit Delivery
        </div>
        <div class="card-body">
          <div class="col-md-12">
              <div class="form-group">
                  <strong>Product Name</strong>
                  <input type="text" name="delivery_name" class="form-control" placeholder="Enter Product Name" value="{{$delivery_info->delivery_name}}">
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
                  <strong>Client</strong>
                  <input type="text" name="client_name" class="form-control" placeholder="Enter Client's Name" value="{{$delivery_info->client_name}}">
                  <span class="text-danger">{{ $errors->first('client_name') }}</span>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                  <strong>Client Email</strong>
                  <input type="text" name="client_email" class="form-control" placeholder="Enter Client's Email" value="{{$delivery_info->client_email}}">
                  <span class="text-danger">{{ $errors->first('client_email') }}</span>
              </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
                <strong> Client Address</strong>
                <input type="text" id="client_direction" class="form-control" name="client_direction" placeholder="Enter Client's Address" value="{{$delivery_info->client_direction}}">
                <span class="text-danger">{{ $errors->first('client_direction') }}</span>
            </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                  <strong>Client Phone</strong>
                  <input type="text" name="client_phone" class="form-control" placeholder="Enter Client's Phone" value="{{$delivery_info->client_phone}}">
                  <span class="text-danger">{{ $errors->first('client_phone') }}</span>
              </div>
          </div>
          <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
<script type="text/javascript">
  google.maps.event.addDomListener(window, 'load', function () {
      var places = new google.maps.places.Autocomplete(document.getElementById('client_direction'));
      google.maps.event.addListener(places, 'place_changed', function () {

      });
  });
</script>
