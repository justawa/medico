@extends('layouts.dashboard')

@php
  $title = "Add Subject";
  $button_text = "Add Subject";
  if($subject->exists) {
    $title = "Edit Subject";
    $button_text = "Update Subject";
  }
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
              @if($subject->exists)
                <form method="POST" action="{{ route('subject.update', $subject) }}">
                @method('put')
              @else 
                <form method="POST" action="{{ route('subject.store') }}">
              @endif
                @csrf
              <div class="card-body">
                <div class="form-group @error('course') has-danger @enderror">
                    <label class="col-form-label" for="course">Course</label>
                    <select class="form-control @error('course') is-invalid @enderror" id="course" name="course">
                        @foreach($courses as $course)
                        <option @if(old('course', $subject->course_id) == $course->id) selected="selected" @endif value={{ $course->id }}>{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @error('course') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group @error('name') has-danger @enderror">
                    <label class="col-form-label" for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $subject->name) }}" placeholder="Subject Name" required>
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group @error('summary') has-danger @enderror">
                    <label class="col-form-label" for="summary">Summary</label>
                    <textarea class="form-control @error('summary') is-invalid @enderror" cols="30" rows="8" placeholder="Subject Summary" id="summary" name="summary" >{{ old('summary', $subject->summary) }}</textarea>
                    @error('summary') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ $button_text }}</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection