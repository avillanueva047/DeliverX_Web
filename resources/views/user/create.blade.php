@extends('layouts.app')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add New Deliver</a></h2>
<br>

<form action="{{ route('user.store') }}" method="POST" name="Add Deliver">
@csrf

<div class="container">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" >
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Email</strong>
            <input type="text" name="email" class="form-control" placeholder="Enter Email">
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection
