@extends('layout.master')
@section ('content')
<h3>Employee Record System</h3>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Full Name</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Mobile Number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employees as $employee)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$employee->firstname}} {{$employee->lastname}}</td>
                  <td>{{$employee->address}}</td>
                  <td>{{$employee->gender}}</td>
                  <td>{{$employee->mobilenumber}}</td>
                  <td>
                    <a href="{{route('employee.show',['employee'=>$employee->id])}}"><i class="fa fa-eye" alt="Detail"></i></a> 
                    <a href="{{route('employee.edit',['employee'=>$employee->id])}}"><i class="fa fa-edit" alt="Edit"></i></a>

                   <form action="{{url('employee', [$employee->id])}}" method="POST" class="d-inline" id="employee">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" value="Delete" class="d-inline text-primary" style="border:none;cursor: pointer;"><i class="fa fa-trash"></i></button>
                    </form>                    
                    
                  </td>                  
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-block">
              {{$employees->links()}}
            </div>
</div>

@endsection