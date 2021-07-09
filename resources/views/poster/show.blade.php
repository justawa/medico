@extends('layouts.dashboard')
@section('title', 'All Images')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Images</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                    <th>#</th>
                    <th>title </th>
                    <th>Category </th>
                    <th>image </th>
                      <th> link </th>
                      <th> description </th>
                      <th> status </th>
                       </tr>
                </tr>
              </thead>

   
           
    
  <?php 
  $count=0;
  ?>

   <tbody>

    @foreach ($poster as $item)

       <tr>
        <td>{{$count=$count+1}}</td> 
        <td>{{$item->title }}</td>
       <td> {{$item->category}}</td>
        
       <td>
               <img src="{{asset('uploads/banner/'.$item->profile_image)}} " width="100px" alt="image">
            </td>      


        <td>{{$item->link }}</td>
        <td>{{$item->discription }} </td> 
        <td>{{$item->status }}</td>
       </tr>
      
       @endforeach
    </tbody>
</table>

@endsection