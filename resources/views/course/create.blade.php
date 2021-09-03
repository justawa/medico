@extends('layouts.dashboard')

@php
  $title = "Add Package";
  $button_text = "Add Package";
  if($course->exists) {
    $title = "Edit Package";
    $button_text = "Update Package";
    $button_text2 = "Delete Package";
  }
@endphp

@section('title', $title)

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                {{ $title }}
              </h3>
            </div>
            <!-- /.card-header -->
              @if($course->exists)
                <form method="POST" action="{{ route('course.update', $course) }}">
                @method('put')
              @else
                <form method="POST" action="{{ route('course.store') }}">
              @endif
                @csrf
                <div class="card-body">
                  <div class="form-group @error('name') has-danger @enderror">
                      <label class="col-form-label" for="name">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $course->name) }}" placeholder="Course Name" required autofocus>
                      @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('summary') has-danger @enderror">
                      <label class="col-form-label" for="summary">Summary</label>
                      <textarea class="form-control @error('summary') is-invalid @enderror" cols="30" rows="8" placeholder="Course Summary" id="summary" name="summary" >{{ old('summary', $course->summary) }}</textarea>
                      @error('summary') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">
                    {{ $button_text }}
                  </button>
                 
                </div>
                <!-- /.card-footer -->
            </form>
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection