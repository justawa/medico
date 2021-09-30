@extends('layouts.dashboard')

@section('title', 'Add Questions')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Randomly Add Questions </h3>
            </div>
            <!-- /.card-header -->
            @if (session('status'))
<h6 class="alert alert-success">{{session('status')}}</h6>
@endif
            <form method="POST" action="{{ route('test.ran') }}">
              @csrf
              <div class="card-body">          
               
                <div class="form-group @error('numb') has-danger @enderror">
                  <label class="col-form-label" for="numb">Number Of Questions</label>                  
                  <input class="form-control @error('numb') is-invalid @enderror" type="text" name="numb"
                   placeholder="Enter Total Number of Question" required>
                  @error('numb') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary"> Next </button>
              </form>
                
               
              <!-- /.card-footer -->
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection