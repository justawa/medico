@extends('layouts.dashboard')
@section('title', 'All Tests')
@section('content')
<!-- Main content -->
{{-- Duplicate of index --}}
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">This Test Have </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table id="dataTable" class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>question</th>
                  {{-- <th>option</th>
                  <th>option</th>
                  <th>option</th>
                  <th>option</th> --}}

                 
                  
                </tr>
              </thead>
              <tbody>
                @if($raj->count() > 0)
                  @foreach($raj as $raj)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $raj->content}}</td>  
                    {{-- <td>{{ $raj->option1}}</td>       
                    <td>{{ $raj->option2}}</td> 
                    <td>{{ $raj->option3}}</td>                                              
                    <td>{{ $raj->option4}}</td> --}}


                  @endforeach
                  @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content -->
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