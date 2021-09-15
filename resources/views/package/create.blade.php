@extends('layouts.dashboard')

@php
  $title = "Add package";
  $button_text = "Add package";
  
@endphp

@section('title', $title)


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
              </div>
              <!-- /.card-header --> 
                     
              <form method="POST" action="{{ route('package.store') }}">
                @csrf
               <div class="card-body">
                {{-- <div class="form-group @error('course') has-danger @enderror">
                  <label class="col-form-label" for="course">Course</label>
                  <select class="form-control @error('course') is-invalid @enderror" id="course" name="course">
                    
                  @foreach($courses as $course)
                      <option @if(old('course', $Packages->courseid) == $course->id) selected @endif value="{{ $course->id }}">{{ $course->name }}</option>
                      @endforeach
                    
                  </select>
                  @error('course') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div> --}}

                <div class="form-group @error('name') has-danger @enderror">
                    <label class="col-form-label" for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                     id="name" name="name" placeholder="Package Name" required>
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group @error('type') has-danger @enderror">
                    <label class="col-form-label" for="type">Type</label>
                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                      <option  value="MERGED">MERGED</option>
                      <option  value="SOLITORY">SOLITORY</option>                                   
                  </select> 
                    @error('type') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group @error('name') has-danger @enderror">
                  <label class="col-form-label" for="name">No Of Question</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="no_of_question" name="no_of_question" required>
                  @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
              <div class="form-group @error('name') has-danger @enderror">
                <label class="col-form-label" for="name">Price</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                 id="price" name="price" placeholder="price" required>
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ $button_text }}</button>
              </div>
              <!-- /.card-footer -->
            {{-- </form> --}}
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection