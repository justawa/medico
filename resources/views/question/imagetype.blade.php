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
             
  </div>


              {{-- @if($question->exists)
                <form method="POST" action="{{ route('question.update', $question) }}">
                @method('put')
              @else --}}
                  <form method="POST" action="{{ route('question.stor') }}">
              {{-- @endif --}}
                @csrf
                <div class="card-body">
                  <div class="form-group @error('subject') has-danger @enderror">
                      <label class="col-form-label" for="subject">Subject</label>
                      <select class="form-control" id="subject" name="subject">
                          @foreach($subjects as $subject)
                          <option @if(old('subject', $question->subject_id) == $subject->id) 
                            selected="selected" @endif value="{{ $subject->id }}">
                            {{ $subject->name }}</option>
                          @endforeach
                      </select>
                     
                  </div>

                  
                  
                  <div class="form-group">
                    <label class="col-form-label" for="QuestionByImage">QuestionByImage</label>
                     <input type="file" class="form-control" name="question_image"><br>
                    
                  </div>

                  <div class="form-group">
                      <label class="col-form-label" for="level">Level {{$question->level}}</label>
                      <select class="form-control" id="level" name="level">
                          <option @if(old('level', $question->level) == "easy") selected @endif value="easy">Easy</option>
                          <option @if(old('level', $question->level) == "medium") selected @endif value="medium">Medium</option>
                          <option @if(old('level', $question->level) == "hard") selected @endif value="hard">Hard</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <label class="col-form-label" for="score">Score</label>
                      <input type="text" class="form-control @error('score') is-invalid @enderror" id="score" name="score" value="{{ old('score', $question->score) }}" placeholder="Score (default 1)" required>
                  </div>
                    
              
                  <div class="form-group">
                    <label class="col-form-label" for="option1_image">Image Option1</label>
                     <input type="file" class="form-control" name="option1_image"><br>
                    
                  </div>

               
                  <div class="form-group">
                    <label class="col-form-label" for="option2_image">Image Option2</label>
                     <input type="file" class="form-control" name="option2_image"><br>
                    
                  </div>
               
                  <div class="form-group">
                    <label class="col-form-label" for="option3_image">Image Optio3</label>
                     <input type="file" class="form-control" name="option3_image"><br>
                    
                  </div>
               
                  <div class="form-group">
                    <label class="col-form-label" for="option4_image">Image Optio4</label>
                     <input type="file" class="form-control" name="option4_image"><br>
                    
                  </div>
                  <div class="form-group">
                      <label class="col-form-label" for="explanation">Explanation</label>
                      <textarea class="form-control @error('explanation') is-invalid @enderror" cols="30" rows="8" placeholder="Explanation" id="explanation" name="explanation" >{{ old('explanation', $option->description) }}</textarea>
                  </div>

                  <div class="form-group">
                      <label class="col-form-label" for="correct">Correct</label>
                      {{-- <input type="text" class="form-control @error('correct') is-invalid @enderror" id="correct" name="correct" placeholder="Correct Answer" value="{{ old('correct', $option->correct) }}" required> --}}
                       <select class="form-control " id="correct" name="correct">
                          <option @if(old('correct') == "1") selected @endif value="1">Option 1</option>
                          <option @if(old('correct') == "2") selected @endif value="2">Option 2</option>
                          <option @if(old('correct') == "3") selected @endif value="3">Option 3</option>
                          <option @if(old('correct') == "4") selected @endif value="4">Option 4</option>
                      </select> 
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