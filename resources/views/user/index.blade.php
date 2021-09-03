@extends('layouts.dashboard')
@section('title', 'DASHBOARD')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">All Users</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table id="dataTable" class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Packages</th>
                
                </tr>
              </thead>
              <tbody>
                @if($users->count() > 0)
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('user.edit', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->packages as $package)
                          {{ $package->name }}
                        @endforeach
                    </td>
                    
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="5">No Data</td>
                  </tr>
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