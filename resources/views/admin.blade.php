@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-20">
            <div class="card">
                <div align = "center" class="card-header">
                  <div align = "left">
                    List of Delivers
                  </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div align = "right">
                      <a href="{{ route('user.create') }}" class="btn btn-success mb-2">Add Deliver</a>
                    </div>
                    <br>
                       <div class="row" align="center">
                            <div class="col-12">
                              <table class="table table-bordered" id="laravel_crud">
                               <thead>
                                  <tr style="text-align:center">
                                     <th>Id</th>
                                     <th>Name</th>
                                     <th>Email</th>
                                     <th>Password</th>
                                     <th>Created at</th>
                                     <th colspan="2">Action</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  @foreach ($users as $user)
                                  <tr style="text-align:center">
                                     <td>{{ $user->id }}</td>
                                     <td>{{ $user->name }}</td>
                                     <td>{{ $user->email}}</td>
                                     <td>{{ $user->password }}</td>
                                     <td>{{ date('Y-m-d', strtotime($user->created_at)) }}</td>
                                     <td> <a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
                                     <td>
                                       <form action="{{ route('user.destroy', $user->id)}}" method="post">
                                          {{ csrf_field() }}
                                          <button class="btn btn-danger" type="submit">Delete</button>
                                       </form>
                                     </td>
                                   </tr>
                                  @endforeach
                               </tbody>
                              </table>
                           </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
@endsection
