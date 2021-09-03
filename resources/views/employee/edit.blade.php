@extends('layout.master')
@section('content')
<form method="post" action="{{route('employee.update',['employee'=>$employee->id])}}" enctype="multipart/form-data">
  {{ csrf_field() }}
   @method('PUT')
  
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control {{$errors->has('firstname')?'is-invalid':''}}" id="firstname" value="{{old('firstname')!=$employee->firstname&&old('firstname')!=''?old('firstname'):$employee->firstname}}" name="firstname">
    <span class="help-block text-danger">{{$errors->first('firstname')}}</span>
  </div>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control {{$errors->has('lastname')?'is-invalid':''}}" id="lastname" value="{{old('lastname')!=$employee->lastname&&old('lastname')!=''?old('lastname'):$employee->lastname}}" name="lastname">
    <span class="help-block text-danger">{{$errors->first('lastname')}}</span>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" id="email" name="email" value="{{old('email')!=$employee->email&&old('email')!=''?old('email'):$employee->email}}">
    <span class="help-block text-danger">{{$errors->first('email')}}</span>
  </div>
  <div class="form-group">
    <label for="mobilenumber">Mobile Number</label>
    <input type="text" class="form-control {{$errors->has('mobilenumber')?'is-invalid':''}}" id="mobilenumber" name="mobilenumber" value="{{old('mobilenumber')!=$employee->mobilenumber&&old('mobilenumber')!=''?old('mobilenumber'):$employee->mobilenumber}}">
    <span class="help-block text-danger">{{$errors->first('mobilenumber')}}</span>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control {{$errors->has('address')?'is-invalid':''}}" id="address" name="address" value="{{old('address')!=$employee->address&&old('address')!=''?old('address'):$employee->address}}">
    <span class="help-block text-danger">{{$errors->first('address')}}</span>
  </div>

  <div class="form-group">
	<label class="control-label"> Gender</label><br/>
  @if(old('gender')!='')
  <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" id="male" value="m" @if(old('gender')=='m') checked @endif>
      <label class="form-check-label" for="male">Male</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" id="female" value="f" @if(old('gender')=='f') checked @endif>
      <label class="form-check-label" for="female">Female</label>
    </div>
  @else
  <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" id="male" value="m" @if($employee->gender=='m') checked @endif>
      <label class="form-check-label" for="male">Male</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" id="female" value="f" @if($employee->gender=='f') checked @endif>
      <label class="form-check-label" for="female">Female</label>
    </div>
  @endif
  	
    <span class="help-block text-danger">{{$errors->first('gender')}}</span>
  </div>
  @if($employee->image!="" || old('image')!="") 
  <div class="" style="height: 200px;display: block">
    <img src="{{asset('asset/image/employee/'.$employee->image)}}" alt="..." class="img-thumbnail" style="height: 100%;">
    <span>Change Image</span>
  </div>
  @endif
  <div class="form-group">
	  <div class="custom-file">
		  <input type="file" class="custom-file-input {{$errors->has('image')?'is-invalid':''}}" id="customFile" name="image" value="">
		  <label class="custom-file-label" for="customFile">Upload Image</label>
	  </div>
    <span class="help-block text-danger">{{$errors->first('image')}}</span>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
