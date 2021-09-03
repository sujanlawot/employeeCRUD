@extends('layout.master')
@section('content')
<div class="card border-success mb-3" style="max-width: 18rem;">
  <div class="card-header bg-transparent border-success">Employee Detail</div>
  <div class="card-body text-success">
  	<img src="{{asset('asset/image/employee/'.$employee->image)}}" alt="..." class="img-thumbnail">
    <h5 class="card-title">{{$employee->firstname.' '.$employee->lastname}}</h5>
    <p class="card-text">{{$employee->address}}</p>
    <p class="card-text">{{$employee->mobilenumber}}</p>
  </div>
  <div class="card-footer bg-transparent border-success">
    <a href="{{route('employee.edit',['employee'=>$employee->id])}}"><i class="fa fa-edit" alt="Edit"></i></a> 
    <form action="{{url('employee', [$employee->id])}}" method="POST" class="d-inline" id="employee">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" value="Delete" class="d-inline text-primary" style="border:none;cursor: pointer;" alt="delete"><i class="fa fa-trash" alt="delete"></i></button>
    </form>
  </div>
</div>
@endsection