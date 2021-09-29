@extends('layouts.dashboard')

@section('title', 'Add Questions')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Randomly Add Questions to the Test</h3>
            </div>
            <!-- /.card-header -->
            <form method="POST" action="{{ route('test.ran') }}">
              @csrf
              <div class="card-body">          
               
                <div class="form-group @error('test') has-danger @enderror">
                  <label class="col-form-label" for="test">No Of Question</label>                  
                  <input class="form-control" type="text" name="numb" >
                </div>
                <button type="submit" class="btn btn-primary"> Next </button>
              </form>
                
               
              <!-- /.card-footer -->
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection