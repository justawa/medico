@extends('layouts.dashboard')
@section('title', 'Show Achiever')
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
                  
                    <th>Rank</th>
                    <th>Name </th>
                    <th>image </th>
                    <th>Percentage </th>                 
                    <th>Action</th>
                    <th>Action</th>
                     </tr>
              </thead>        

 <tbody>
        @foreach ($Achiever as $item)

    <tr>
       <td>{{$item->id}}</td>
       <td>{{$item->name }}</td>
       <td><img src="{{asset('Achiever/'.$item->profile_image)}} " width="100px" height="60px" alt="image"></td>      
       <td>{{$item->percent }}</td>

       <td> <a href="{{url('edit-a/'.$item->id)}}" class="btn btn-primary">Edit</a></td>
       <td> <a href="{{url('delete-a/'.$item->id)}}" class="btn btn-danger">Delete</a>   </td>
    </tr>
      
    @endforeach
  </tbody>
</table>

@endsection