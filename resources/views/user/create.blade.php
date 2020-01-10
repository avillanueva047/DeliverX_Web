@extends('layouts.app')

@section('content')

<form action="{{ route('user.store') }}" method="POST" name="Add Deliver">
@csrf
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card text-dark bg-white mb-3">
        <div align = "left" class="card-header font-weight-bold text-md-center">
          Add New Deliver
        </div>
        <div class="container-fluid" style="padding-left: 100px">
          <div class="card-body">
            <div class="col-md-12">
                <div class="form-group row">
                    <strong class="col-md-2 col-form-label text-md-right">Name</strong>
                    <div class="col-md-8">
                      <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <strong class="col-md-2 col-form-label text-md-right">Email</strong>
                    <div class="col-md-8">
                      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <strong class="col-md-2 col-form-label text-md-right">Password</strong>
                    <div class="col-md-8">
                      <input type="text" name="password" class="form-control" placeholder="Enter Password">
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <strong class="col-md-2 col-form-label text-md-right">Confirm Password</strong>
                    <div class="col-md-8">
                      <input type="text" name="confirm-password" class="form-control" placeholder="Confirm Password">
                      <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <button type="submit" class="btn btn-outline-primary">Register Deliver</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
