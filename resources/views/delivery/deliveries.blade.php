@extends('layouts.app')

@section('content')
<div class = "container-fluid" ng-controller="DeliveryController">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card text-dark bg-white mb-3">
        <div align = "left" class="card-header">
          List of Deliveries
        </div>
        <div class="card-body">
          <div align = "right">
            <a href="{{ route('delivery.create') }}" class="btn btn-outline-success" style = "border: none;">
              <img src=https://image.flaticon.com/icons/svg/1212/1212329.svg width="30" height="30"> New Delivery
            </a>
          </div>
          <br>
          <form action = "{{ route('delivery.search') }}" method = "GET" name="Search Delivery">
            <div class="input-group">
              <input type="search" name="delivery_search" class="form-control" placeholder="Type Product's Name">
              <span class="input-group-prepend">
                <button type="submit" class="btn btn-outline-primary">
                  <img src=https://image.flaticon.com/icons/svg/457/457716.svg width="20" height="20"> Search Delivery
                </button>
              </span>
            </div>
          </form>
          <br>
          <div class="row" align="center">
            <div class="col-12" style="overflow-x:auto;">
              @if (count($deliveries) === 0)
                <img src=https://image.flaticon.com/icons/svg/1480/1480807.svg width="200" height="200">
                <br>
                Especified Product does not exist on our Deliveries records
              @else
              <table class="table table-bordered" id="delivers_table">
                <thead>
                  <tr style="text-align:center">
                     <th>Product</th>
                     <th>Deliver Assigned</th>
                     <th>Client</th>
                     <th>Client Email</th>
                     <th>Client Address</th>
                     <th>Client Phone</th>
                     <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($deliveries as $delivery)
                  <tr style="text-align:center">
                     <td>{{ $delivery->delivery_name }}</td>
                     <td>{{ $delivery->deliver_name }}</td>
                     <td>{{ $delivery->client_name }}</td>
                     <td>{{ $delivery->client_email }}</td>
                     <td>{{ $delivery->client_direction }}</td>
                     <td>{{ $delivery->client_phone }}</td>
                     <td> <a href="{{ route('delivery.edit', $delivery->id)}}"class="btn btn-outline-primary" style = "border: none;"><img src=https://image.flaticon.com/icons/svg/1160/1160515.svg width="30" height="30"></a></td>
                     <td>
                       <form action="{{ route('delivery.destroy', $delivery->id) }}" method="post">
                          {{ csrf_field() }}
                          <button class="btn btn-outline-danger" style = "border: none;" type="submit"> <img src=https://image.flaticon.com/icons/svg/1632/1632602.svg width="30" height="30"></button>
                       </form>
                     </td>
                   </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
