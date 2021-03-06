@extends('layouts.app')

@section('content')
<div class = "container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card text-dark bg-white mb-3">
        <div align = "left" class="card-header font-weight-bold text-md-center">
          List of Delivers
        </div>
        <div class="container-fluid" style="padding-left: 40px; padding-right: 40px; padding-bottom: 30px">
          <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div align = "right">
              <a href="{{ route('user.create') }}" class="btn btn-outline-success" style = "border: none;">
                <i class="fas fa-user-plus fa-lg"></i>
                New Deliver
              </a>
            </div>
            <br>
            <form action = "{{ route('user.search') }}" method = "GET" name="Search User">
              <div class="input-group">
                <input id="search_input" type="search" name="user_search" class="form-control" placeholder="Type Deliver's Name" value="{{$search ?? ''}}">
                <span class="input-group-prepend">
                  <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-search fa-lg"></i>
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
                       <td> <a href="{{ route('users.edit', $user->id)}}" class="btn btn-outline-primary" style = "border: none;"><i class="fas fa-edit fa-lg"></i> </a></td>
                       <td>
                         <form action="{{ route('user.destroy', $user->id)}}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-outline-danger" style = "border: none;" type="submit"><i class="fas fa-trash fa-lg"></i></button>
                         </form>
                       </td>
                     </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $users->links() }}
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script type="text/javascript">
  window.addEventListener('load', function clear() {
    var search = document.getElementById('search_input');
      search.addEventListener("search", function(event){
      if (search.value == ""){
        window.location.href = '{{ route("admin.dashboard") }}';
      }
    });
  });
</script>
