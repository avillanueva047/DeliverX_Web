@extends('layouts.app')

@section('content')
<div class = "container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card text-dark bg-white mb-3">
        <div align = "left" class="card-header">
          List of Delivers
        </div>
        <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          <div align = "right">
            <a href="{{ route('user.create') }}" class="btn btn-outline-success" style = "border: none;"><img src=https://image.flaticon.com/icons/svg/226/226850.svg width="30" height="30"></a>
          </div>
          <br>
          <form action = "{{ route('user.search') }}" method = "GET" name="Search User">
            <div class="input-group">
              <input type="search" name="user_search" class="form-control" placeholder="Type Deliver's Name">
              <span class="input-group-prepend">
                <button type="submit" class="btn btn-outline-primary">
                  <img src=https://image.flaticon.com/icons/svg/457/457716.svg width="20" height="20"> Search Deliver
                </button>
              </span>
            </div>
          </form>
          <br>
          <div class="row" align="center">
            <div class="col-12" style="overflow-x:auto;">
              @if (count($users) === 0)
                <img src=https://image.flaticon.com/icons/svg/1480/1480807.svg width="200" height="200">
                <br>
                Especified Deliver does not exist on our records
              @else
              <table class="table table-bordered" id="delivers_table">
                <thead>
                  <tr style="text-align:center">
                     <th>Name</th>
                     <th>Email</th>
                     <th>Joined</th>
                     <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr style="text-align:center">
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email}}</td>
                     <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                     <td> <a href="{{ route('users.edit', $user->id)}}" class="btn btn-outline-primary" style = "border: none;"><img src=https://image.flaticon.com/icons/svg/1160/1160515.svg width="30" height="30"></a></td>
                     <td>
                       <form action="{{ route('user.destroy', $user->id)}}" method="post">
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
