@extends('layouts.app')

@section('content')

<form action="{{ route('user.store') }}" method="POST" name="Add Deliver">
@csrf
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card text-dark bg-white mb-3">
        <div align = "left" class="card-header">
          Add New Deliver
        </div>
        <div class="card-body">
          <div class="col-md-12">
              <div class="form-group">
                  <strong>Name</strong>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                  <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                  <strong>Email</strong>
                  <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                  <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                  <strong>Password</strong>
                  <input type="text" name="password" class="form-control" placeholder="Enter Password">
                  <span class="text-danger">{{ $errors->first('password') }}</span>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                  <strong>Confirm Password</strong>
                  <input type="text" name="confirm-password" class="form-control" placeholder="Confirm Password">
                  <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
              </div>
          </div>
          <div class="col-md-12">
              <button type="submit" class="btn btn-outline-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
