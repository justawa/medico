@extends('layouts.dashboard')
@section('title', 'About Section')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table class="table table-head-fixed text-nowrap">
              
              <thead>
                <tr>
                    <th>About </th>
                    <th>Action </th>
                </tr>
              </thead>        

  <tbody>
      @foreach ($About as $item)
       <tr>
         <td><pre style="white-space:pre-wrap; word-wrap:break-word"> {{$item->about }} </pre></td>
       <td> <a href="{{url('edit-a/'.$item->id)}}" class="btn btn-primary">Edit</a></td>   
       </tr>
      @endforeach

  </tbody>

</table>
@endsection