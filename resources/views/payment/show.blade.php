@extends('layouts.dashboard')
@section('title', 'Payment Data')
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
                    <th>Transaction ID </th>
                    <th>Package ID </th>
                    <th> Student ID </th>
                    <th> Amount </th>
                    <th> status </th>
                     </tr>
              </thead>        

              <?php 
              $count=0;
              ?>

             <tbody>
                    @foreach ($payment as $item)

                <tr>
                   <td>{{$count=$count+1}}</td> 
                   <td>{{$item->id}}</td>
                   <td>{{$item->tid }}</td>
                   <td> {{$item->pid}}</td>
                   <td>{{$item->studentid }}</td>
                   <td>{{$item->amount }} </td> 
                   <td>{{$item->status }}</td>
                </tr>

                @endforeach
              </tbody>

</table>

@endsection