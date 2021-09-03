@extends('layout.master')
@section('content')
<h3>Create New Employee</h3>
<form method="post" action="{{url('employee')}}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control {{$errors->has('firstname')?'is-invalid':''}}" id="firstname" value="{{ old('firstname')}}" name="firstname">
    <span class="help-block text-danger">{{$errors->first('firstname')}}</span>
  </div>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control {{$errors->has('lastname')?'is-invalid':''}}" id="lastname" value="{{ old('lastname')}}" name="lastname">
    <span class="help-block text-danger">{{$errors->first('lastname')}}</span>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" id="email" name="email" value="{{old('email')}}">
    <span class="help-block text-danger">{{$errors->first('email')}}</span>
  </div>
  <div class="form-group">
    <label for="mobilenumber">Mobile Number</label>
    <input type="text" class="form-control {{$errors->has('mobilenumber')?'is-invalid':''}}" id="mobilenumber" name="mobilenumber" value="{{old('mobilenumber')}}">
    <span class="help-block text-danger">{{$errors->first('mobilenumber')}}</span>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control {{$errors->has('address')?'is-invalid':''}}" id="address" name="address" value="{{old('address')}}">
    <span class="help-block text-danger">{{$errors->first('address')}}</span>
  </div>

  <div class="form-group">
	<label class="control-label"> Gender</label><br/>
  	<div class="form-check form-check-inline">
  	  <input class="form-check-input" type="radio" name="gender" id="male" value="m" @if(old('gender')=='m') checked @endif>
  	  <label class="form-check-label" for="male">Male</label>
  	</div>
  	<div class="form-check form-check-inline">
  	  <input class="form-check-input" type="radio" name="gender" id="female" value="f" @if(old('gender')=='f') checked @endif>
  	  <label class="form-check-label" for="female">Female</label>
  	</div>
    <span class="help-block text-danger">{{$errors->first('gender')}}</span>
  </div>
  <div class="form-group">
	  <div class="custom-file">
		  <input type="file" class="custom-file-input {{$errors->has('image')?'is-invalid':''}}" id="customFile" name="image" value="{{old('image')}}">
		  <label class="custom-file-label" for="customFile">Upload Image</label>
	  </div>
    <span class="help-block text-danger">{{$errors->first('image')}}</span>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
