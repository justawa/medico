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
                  <label class="col-form-label" for="test">Test</label>
                  <select class="form-control @error('test') is-invalid @enderror" id="test" name="test">
                    @foreach($tests as $test)
                    <option value={{ $test->id }}>{{ $test->name }}</option>
                    @endforeach
                  </select>
                  @error('test') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- <div class="form-group @error('test') has-danger @enderror">
                  <label class="col-form-label" for="test">No Of Question</label>                  
                  <input class="form-control" type="text" name="number" >
                </div> --}}
                <button type="submit" class="btn btn-primary">Add Random Question</button>
              </form>
                
               
              <!-- /.card-footer -->
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection