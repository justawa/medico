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
            <h3 class="card-title">HeadLine</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  
                    <th>HeadLine </th>
                    <th>Action </th>
                </tr>
              </thead>        

 <tbody>
        @foreach ($Headline as $item)

    <tr>
       <td><h2>{{$item->headline }}</h2></td>
       <td> <a href="{{url('edit-h/'.$item->id)}}" class="btn btn-primary">Edit</a></td>   
    </tr>
      
    @endforeach
  </tbody>
</table>

@endsection