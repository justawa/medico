@extends('layouts.dashboard')
@section('title', 'Random Questions')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Random Questions </h3>
            </div>
            <!-- /.card-header -->
            @if (session('status'))
<h6 class="alert alert-success">{{session('status')}}</h6>
@endif
            <form method="POST" action="{{ route('test.question.store') }}">
              @csrf
              <div class="card-body">  

                <div class="form-group @error('test') has-danger @enderror">
                  <label class="col-form-label" for="test">Test</label>
                  <select class="form-control @error('test') is-invalid @enderror" id="test" name="test">
                    @foreach($tests as $test)
                    <option value={{ $test->id }}>{{ $test->name }}</option>
                    @endforeach
                  </select>
                  @error('test') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>             

                <div class="form-group">
                <?php $counter=0; ?>
                
                <div class="card-body table-responsive p-0" style="height: 60vh;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>                        
                        <th>Question</th>
                      </tr>
                    </thead>  

                   
                    <tbody>

                  @foreach ($result as $res)                                   
                  <?php $c= $loop->index; ?>   
                  <tr>
                    <td> {{$loop->iteration}} </td> 
                    <td> {{$res->content}} </td>     
                    </tr>

                   <input type="hidden" name="number[{{$c}}]" value="{{$res->id}}" >
                  
                  <?php   $counter++;   ?>  
                  
                  @endforeach   
                </tbody>
              </table>              
                </div>          

                <input type="hidden" name="count" value="{{$counter}}" >
                
                <button type="submit" class="btn btn-primary">Add Random Question</button>
              </form>
                                             
          </div>
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