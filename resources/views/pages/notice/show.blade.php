@extends('layouts.dashboard')
@section('title', 'Show Notice')
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
            <table id="dataTable" class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  
                    <th>ID</th>
                    <th>Notice </th>                        
                    <th>tag </th>                               
                    <th>Edit</th>
                    <th>Delete</th>
                     </tr>
              </thead>        

 <tbody>
        @foreach ($Notice as $item)

    <tr>
       <td>{{$item->id}}</td>
       <td>{{$item->notice }}</td>
       <td>{{$item->tag }}</td>
       <td> <a href="{{url('edit-n/'.$item->id)}}" class="btn btn-primary">Edit</a></td>
       <td> <a href="{{url('delete-n/'.$item->id)}}" class="btn btn-danger">Delete</a>   </td>
    </tr>
      
    @endforeach
  </tbody>
</table>

@endsection

@section('scripts')
  <script>
    $(document).ready( function () {
      $('#dataTable').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false
      });
        });
  </script>
@endsection