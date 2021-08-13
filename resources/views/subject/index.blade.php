@extends('layouts.dashboard')
@section('title', 'All Subjects')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">All Subjects</h3>
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
                @if($subjects->count() > 0)
                  @foreach($subjects as $subject)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('subject.edit', $subject->id) }}">{{ $subject->name }}</a></td>
                    <td>{{ $subject->summary }}</td>
                    <td>{{ $subject->active ? 'Active' : 'Not Active' }}</td>
                    <td>
                      <a href="{{ route('subject.update.status', $subject->id) }}" class="btn btn-default" 
                          onclick="event.preventDefault();
                          document.getElementById('status-update-form{{ $subject->id }}').submit();">
                        {{ $subject->active ? 'Deactivate' : 'Activate' }}
                      </a>
                      <form id="status-update-form{{ $subject->id }}" action="{{ route('subject.update.status', $subject->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="{{ $subject->active ? 0 : 1 }}" />
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