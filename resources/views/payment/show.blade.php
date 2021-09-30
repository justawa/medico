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
            <table id="dataTable" class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                 
                    <th>S.No</th>
                    <th> Transaction ID </th>
                    <th> Package Name </th>
                    <th> Student Id </th>
                    <th> Student Name </th>
                    <th> Amount </th>
                    <th> Status </th>
                    <th> Payment Time</th>

                     </tr>
              </thead>        
    
             
            

              <?php $count=0;  ?>           

             <tbody>
                    @foreach ($payment as $item)

                <tr>
                  
                   <td>{{$count=$count+1}}</td> 
                   {{-- <td>{{$item->id}}</td> --}}
                   <td>{{$item->tid }}</td>
                   <td> {{$item->pid}}</td>
                   <td>{{$item->student_id }}</td>
                   <td>{{$item->studentid }}</td>
                   <td>{{$item->amount }} </td> 
                   {{-- <td>{{$item->status }}</td> --}}
                
                   @if ($item->status ==1)
                   <td>{{"Paid"}} </td> 
                     @else
                     
                   <td>{{"Failed"}} </td> 
                         
                     @endif
                  
                   <td>{{$item->created_at}} </td> 

                   

                </tr>
                @endforeach
              </tbody>

</table>
          </div>
<div class="card-footer">
  <a href="export" class="btn btn-primary"><i class="fas fa-file-export"></i>Export In Excel</a>

</div>
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