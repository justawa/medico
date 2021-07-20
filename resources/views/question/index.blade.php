@extends('layouts.dashboard')
@section('title', 'All Questions')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Questions</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table id="dataTable" class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Content</th>
                  <th>Subject</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($questions->count() > 0)
                  @foreach($questions as $question)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('question.edit', $question) }}">{{ $question->content }}</a></td>
                    <td>{{ $question->subject->name }}</td>
                    <td>{{ $question->active ? 'Active' : 'Not Active' }}</td>
                    <td>
                      <a href="{{ route('question.update.status', $question->id) }}" class="btn btn-default" 
                          onclick="event.preventDefault();
                          document.getElementById('status-update-form{{ $question->id }}').submit();">
                        {{ $question->active ? 'Deactivate' : 'Activate' }}
                      </a>
                      <form id="status-update-form{{ $question->id }}" action="{{ route('question.update.status', $question->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="{{ $question->active ? 0 : 1 }}" />
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
       // "scrollCollapse": true,
        "info":     false
      });
        });
  </script>
@endsection