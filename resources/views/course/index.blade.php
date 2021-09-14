@extends('layouts.dashboard')
@section('title', 'All Courses')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">All Courses</h3>
          </div>
            {{-- <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div> --}}
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh">
            <table id="dataTable" class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  {{-- <th>#</th> --}}
                  <th>Name</th>
                  <th>Summary</th>
                  <th>Status</th>
                  <th>Action</th>
                  {{-- <th>Action</th> --}}

                </tr>
              </thead>
              <tbody>

                @if($courses->count() > 0)
                  @foreach($courses as $course)
                  <tr>
                    @if ($course->active == 1)
                    {{-- <td>{{ $loop->iteration }}</td> --}}
                      
                    <td><a href="{{ route('course.edit', $course) }}">{{ $course->name }}</a></td>
                    <td>{{ $course->summary }}</td>
                    <td>{{ $course->active ? 'Active' : 'Not Active' }}</td>
                    <td>
                      <a href="{{ route('course.update.status', $course->id) }}" class="btn btn-default" 
                        onclick="event.preventDefault();
                          document.getElementById('status-update-form{{ $course->id }}').submit();">
                        {{ $course->active ? 'Delete' : 'Activate' }}
                      </a>
                      <form id="status-update-form{{ $course->id }}" action="{{ route('course.update.status', $course->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="{{ $course->active ? 0 : 1 }}" />
                      </form>
                    </td>
                    @endif 
                    {{-- <td> <button  class="btn btn-danger"> <a href="{{url('delete-course/'.$course->id)}}"> Delete</a> </button></td> --}}
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