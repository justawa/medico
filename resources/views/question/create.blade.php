@extends('layouts.dashboard')

@php
  $title = "Add Question";
  $button_text = "Add Question";
  if($question->exists) {
    $title = "Edit Question";
    $button_text = "Update Question";
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
              @if($question->exists)
                <form method="POST" action="{{ route('question.update', $question) }}">
                @method('put')
              @else
                  <form method="POST" action="{{ route('question.store') }}">
              @endif
                @csrf
                <div class="card-body">
                  <div class="form-group @error('subject') has-danger @enderror">
                      <label class="col-form-label" for="subject">Subject</label>
                      <select class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject">
                          @foreach($subjects as $subject)
                          <option @if(old('subject', $question->subject_id) == $subject->id) selected="selected" @endif value={{ $subject->id }}>{{ $subject->name }}</option>
                          @endforeach
                      </select>
                      @error('subject') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('question') has-danger @enderror">
                      <label class="col-form-label" for="question">Question</label>
                      <textarea class="form-control @error('question') is-invalid @enderror" cols="30" rows="8" placeholder="Question" id="question" name="question" >{{ old('question', $question->content) }}</textarea>
                      @error('question') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('level') has-danger @enderror">
                      <label class="col-form-label" for="level">Level</label>
                      <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                          <option @if(old('level', $question->level) == "easy") selected="selected" @endif value="easy">Easy</option>
                          <option @if(old('level', $question->level) == "medium") selected="selected" @endif value="medium">Medium</option>
                          <option @if(old('level', $question->level) == "hard") selected="selected" @endif value="hard">Hard</option>
                      </select>
                      @error('level') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('score') has-danger @enderror">
                      <label class="col-form-label" for="score">Score</label>
                      <input type="text" class="form-control @error('score') is-invalid @enderror" id="score" name="score" value="{{ old('score', $question->score) }}" placeholder="Score (default 1)" required>
                      @error('score') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('option') has-danger @enderror">
                      <label class="col-form-label" for="option1">Option 1</label>
                      <input type="text" class="form-control @error('option') is-invalid @enderror" id="option1" name="option[]" placeholder="Option" required>
                      @error('option') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('option') has-danger @enderror">
                      <label class="col-form-label" for="option2">Option 2</label>
                      <input type="text" class="form-control @error('option') is-invalid @enderror" id="option2" name="option[]" placeholder="Option" required>
                      @error('option') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('option') has-danger @enderror">
                      <label class="col-form-label" for="option3">Option 3</label>
                      <input type="text" class="form-control @error('option') is-invalid @enderror" id="option3" name="option[]" placeholder="Option" required>
                      @error('option') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('option') has-danger @enderror">
                      <label class="col-form-label" for="option4">Option 4</label>
                      <input type="text" class="form-control @error('option') is-invalid @enderror" id="option4" name="option[]" placeholder="Option" required>
                      @error('option') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('explanation') has-danger @enderror">
                      <label class="col-form-label" for="explanation">Explanation</label>
                      <textarea class="form-control @error('explanation') is-invalid @enderror" cols="30" rows="8" placeholder="Explanation" id="explanation" name="explanation" >{{ old('explanation', $question->optionExplanation()) }}</textarea>
                      @error('explanation') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('correct') has-danger @enderror">
                      <label class="col-form-label" for="correct">Correct</label>
                      <select class="form-control @error('correct') is-invalid @enderror" id="correct" name="correct">
                          <option @if(old('correct') == "0") selected="selected" @endif value="0">Option 1</option>
                          <option @if(old('correct') == "1") selected="selected" @endif value="1">Option 2</option>
                          <option @if(old('correct') == "2") selected="selected" @endif value="2">Option 3</option>
                          <option @if(old('correct') == "3") selected="selected" @endif value="3">Option 4</option>
                      </select>
                      @error('correct') <span class="invalid-feedback">{{ $message }}</span> @enderror
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