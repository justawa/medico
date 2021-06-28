@extends('layouts.dashboard')
@section('title', 'All Tests')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Tests</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table class="table table-head-fixed text-nowrap">
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
                @if($tests->count() > 0)
                  @foreach($tests as $test)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('test.edit', $test) }}">{{ $test->name }}</a></td>
                    <td>{{ $test->summary }}</td>
                    <td>{{ $test->active ? 'Active' : 'Not Active' }}</td>
                    <td>
                      <a href="{{ route('test.update.status', $test->id) }}" class="btn btn-default" 
                          onclick="event.preventDefault();
                          document.getElementById('status-update-form{{ $test->id }}').submit();">
                        {{ $test->active ? 'Deactivate' : 'Activate' }}
                      </a>
                      <form id="status-update-form{{ $test->id }}" action="{{ route('test.update.status', $test->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="{{ $test->active ? 0 : 1 }}" />
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