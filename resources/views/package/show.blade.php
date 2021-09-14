@extends('layouts.dashboard')
@section('title', 'All Packages')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">All Packages</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table id="dataTable" class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Summary</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($Packages->count() > 0)
                  @foreach($Packages as $package)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{--  --}}
                    <td><a href="{{ route('package.edit', $package->id) }}">{{ $package->name }}</a></td>
                    <td><pre style="white-space:pre-wrap; word-wrap:break-word">{{ $package->summary }}</pre></td>
                    <td>{{ $package->active ? 'Active' : 'Not Active' }}</td>
                    <td>
                      <a href="{{ route('package.update.status', $package->id) }}" class="btn btn-default" 
                          onclick="event.preventDefault();
                          document.getElementById('status-update-form{{ $package->id }}').submit();">
                        {{ $package->active ? 'Deactivate' : 'Activate' }}
                      </a> 
                      <form id="status-update-form{{ $package->id }}" action="{{ route('package.update.status', $package->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="{{ $package->active ? 0 : 1 }}" />
                      </form>
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