@extends('layouts.dashboard')
@section('title', 'Show Doctors')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">All Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  
                    <th>ID</th>
                    <th>Name </th>
                    <th>image </th>  
                    <th>Specilization </th>                               
                    <th>Place </th>                               

                    <th>Edit</th>
                    <th>Delete</th>
                     </tr>
              </thead>        

 <tbody>
        @foreach ($Counselling as $item)

    <tr>
       <td>{{$item->id}}</td>
       <td>{{$item->name }}</td>
       <td><img src="{{asset('Counselling/'.$item->profile_image)}} " width="100px" height="60px" alt="image"></td>      
       <td>{{$item->specilization }}</td>
       <td>{{$item->place }}</td>
       <td> <a href="{{url('edit-c/'.$item->id)}}" class="btn btn-primary">Edit</a></td>
       <td> <a href="{{url('delete-c/'.$item->id)}}" class="btn btn-danger">Delete</a>   </td>
    </tr>
      
    @endforeach
  </tbody>
</table>

@endsection