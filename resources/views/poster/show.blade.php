@extends('layouts.dashboard')
@section('title', 'Show Image')
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
                    <th>S.No</th>
                    <th>ID</th>
                    <th>title </th>
                    <th>Category </th>
                    <th> link </th>
                    <th> description </th>
                    <th>image </th>
                    <th> status </th>
                    <th>Action</th>
                    <th>Action</th>
                     </tr>
              </thead>        
    
  <?php 
  $count=0;
  ?>

 <tbody>
        @foreach ($poster as $item)

    <tr>
       <td>{{$count=$count+1}}</td> 
       <td>{{$item->id}}</td>
       <td>{{$item->title }}</td>
       <td> {{$item->category}}</td>
       <td>{{$item->link }}</td>
       <td>{{$item->discription }} </td> 
       <td><img src="{{asset('uploads/banner/'.$item->profile_image)}} " width="100px" alt="image"></td>      
       <td>{{$item->status }}</td>
       <td> <a href="{{url('edit-image/'.$item->id)}}" class="btn btn-primary">Edit</a></td>
       <td> <a href="{{url('delete-image/'.$item->id)}}" class="btn btn-danger">Delete</a>   </td>
    </tr>
      
    @endforeach
  </tbody>
</table>

@endsection