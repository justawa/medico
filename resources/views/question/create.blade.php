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
  
  <div class="card-body">
             

                  
                  {{-- Image Wise Form --}}

                  <div class="image-list" style="display: none">
                    {{-- @if($question->exists) --}}
                    {{-- <form method="POST" action="{{ route('question.update', $question) }}"> --}}
                    {{-- @method('put') --}}
                  {{-- @else --}}
                      <form method="POST" action="{{ route('question.stor') }}" enctype="multipart/form-data">
                  {{-- @endif --}}
                    @csrf
                    <label class="radio-inline"><input type="radio" name="questionCategory" value="0">&nbsp;Text Wise</label>&nbsp;&nbsp;
                    <label class="radio-inline"><input type="radio" name="questionCategory" value="1" checked>&nbsp;Image Wise</label>                
                    
                    <div class="form-group @error('course') has-danger @enderror">
                      <label class="col-form-label" for="course">Course</label>
                      <select class="form-control @error('course') is-invalid @enderror" id="course" name="course">
                        
                      @foreach($courses as $course)
                          <option value="{{ $course->id }}">{{ $course->name }}</option>
                          @endforeach
                        
                      </select>
                      @error('course') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                    <div class="form-group @error('subject') has-danger @enderror">
                          <label class="col-form-label" for="subject">Subject</label>
                          <select class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject">
                              @foreach($subjects as $subject)
                              <option @if(old('subject', $question->subject_id) == $subject->id) selected="selected" @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                              @endforeach
                          </select>
                          @error('subject') <span class="invalid-feedback">{{ $message }}</span> @enderror
                      </div>
                      <div class="form-group @error('question_name') has-danger @enderror">
                        <label class="col-form-label" for="question_name">Question</label>
                        <textarea class="form-control @error('question') is-invalid @enderror" cols="30" rows="8" placeholder="Question" id="question_name" name="question_name" >{{ old('question_name', $question->content) }}</textarea>
                        @error('question_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>                
                    <div class="form-group">
                      <label class="col-form-label" for="QuestionByImage">QuestionByImage</label>
                       <input type="file" class="form-control" name="question_image"><br>
                      
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="option1_image">Image Option 1</label>
                       <input type="file" class="form-control" name="option1_image"><br>
                      
                    </div>
  
                 
                    <div class="form-group">
                      <label class="col-form-label" for="option2_image">Image Option 2</label>
                       <input type="file" class="form-control" name="option2_image"><br>
                      
                    </div>
                 
                    <div class="form-group">
                      <label class="col-form-label" for="option3_image">Image Option 3</label>
                       <input type="file" class="form-control" name="option3_image"><br>
                      
                    </div>
                 
                    <div class="form-group">
                      <label class="col-form-label" for="option4_image">Image Option 4</label>
                       <input type="file" class="form-control" name="option4_image"><br>
                      
                    </div>
                    <div class="form-group @error('level') has-danger @enderror">
                      <label class="col-form-label" for="level">Level</label>
                      <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                          <option @if(old('level', $question->level) == "easy") selected @endif value="easy">Easy</option>
                          <option @if(old('level', $question->level) == "medium") selected @endif value="medium">Medium</option>
                          <option @if(old('level', $question->level) == "hard") selected @endif value="hard">Hard</option>
                      </select>
                      @error('level') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('score') has-danger @enderror">
                      <label class="col-form-label" for="score">Score</label>
                      <input type="text" class="form-control @error('score') is-invalid @enderror" id="score" name="score" value="{{ old('score', $question->score) }}" placeholder="Score">
                      @error('score') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
                    
                
                  <div class="form-group @error('explanation') has-danger @enderror">
                      <label class="col-form-label" for="explanation">Explanation</label>
                      <textarea class="form-control @error('explanation') is-invalid @enderror" cols="30" rows="8" placeholder="Explanation" id="explanation" name="explanation" >{{ old('explanation', $option->description) }}</textarea>
                      @error('explanation') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group @error('correct') has-danger @enderror">
                      <label class="col-form-label" for="correct">Correct</label>                      
                       <select class="form-control @error('correct') is-invalid @enderror" id="correct" name="correct">
                          <option @if(old('correct' ,$option->correct) == "1") selected @endif value="1">Option 1</option>
                          <option @if(old('correct' ,$option->correct) == "2") selected @endif value="2">Option 2</option>
                          <option @if(old('correct' ,$option->correct) == "3") selected @endif value="3">Option 3</option>
                          <option @if(old('correct' ,$option->correct) == "4") selected @endif value="4">Option 4</option>
                      </select> 
                      @error('correct') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

               
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ $button_text }}</button>
                </div>
                <!-- /.card-footer -->
             </form>  
            </div>

                  {{-- Text Wise Form --}}
                  <div class="text-list" style="display: show">
                    @if($question->exists)
                    <form method="POST" action="{{ route('question.update', $question) }}">
                    @method('put')
                  @else
                      <form method="POST" action="{{ route('question.store') }}">
                  @endif
                    @csrf
                    <label class="radio-inline"><input type="radio" name="questionCategory" value="0" checked>&nbsp;Text Wise</label>&nbsp;&nbsp;
                    <label class="radio-inline"><input type="radio" name="questionCategory" value="1">&nbsp;Image Wise</label>
                
                    <div class="form-group @error('course') has-danger @enderror">
                      <label class="col-form-label" for="course">Course</label>
                      <select class="form-control @error('course') is-invalid @enderror" id="course" name="course">
                        
                      @foreach($courses as $course)
                          <option value="{{ $course->id }}">{{ $course->name }}</option>
                          @endforeach
                        
                      </select>
                      @error('course') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                      <div class="form-group @error('subject') has-danger @enderror">
                          <label class="col-form-label" for="subject">Subject</label>
                          <select class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject">
                              @foreach($subjects as $subject)
                              <option @if(old('subject', $question->subject_id) == $subject->id) selected="selected" @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                              @endforeach
                          </select>
                          @error('subject') <span class="invalid-feedback">{{ $message }}</span> @enderror
                      </div>

                  <div class="form-group @error('question_name') has-danger @enderror">
                      <label class="col-form-label" for="question_name">Question</label>
                      <textarea class="form-control @error('question') is-invalid @enderror" cols="30" rows="8" placeholder="Question" id="question_name" name="question_name" >{{ old('question_name', $question->content) }}</textarea>
                      @error('question_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
                  
                  <div class="form-group @error('option1') has-danger @enderror">
                    <label class="col-form-label" for="option1">Option 1</label>
                    <input type="text" class="form-control @error('option1') is-invalid @enderror" id="option1" name="option1" placeholder="Option 1" value="{{ old('option1', $option->option1) }}">
                    @error('option1') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group @error('option2') has-danger @enderror">
                    <label class="col-form-label" for="option2">Option 2</label>
                    <input type="text" class="form-control @error('option2') is-invalid @enderror" id="option2" name="option2" placeholder="Option 2" value="{{ old('option2', $option->option2) }}">
                    @error('option2') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
               
                <div class="form-group @error('option3') has-danger @enderror">
                    <label class="col-form-label" for="option3">Option 3</label>
                    <input type="text" class="form-control @error('option3') is-invalid @enderror" id="option3" name="option3" placeholder="Option 3" value="{{ old('option3', $option->option3) }}">
                    @error('option3') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group @error('option4') has-danger @enderror">
                    <label class="col-form-label" for="option4">Option 4</label>
                    <input type="text" class="form-control @error('option4') is-invalid @enderror" id="option4" name="option4" placeholder="Option 4" value="{{ old('option4', $option->option4) }}">
                    @error('option4') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group @error('level') has-danger @enderror">
                  <label class="col-form-label" for="level">Level</label>
                  <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                      <option @if(old('level', $question->level) == "easy") selected @endif value="easy">Easy</option>
                      <option @if(old('level', $question->level) == "medium") selected @endif value="medium">Medium</option>
                      <option @if(old('level', $question->level) == "hard") selected @endif value="hard">Hard</option>
                  </select>
                  @error('level') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>

              <div class="form-group @error('score') has-danger @enderror">
                  <label class="col-form-label" for="score">Score</label>
                  <input type="text" class="form-control @error('score') is-invalid @enderror" id="score" name="score" value="{{ old('score', $question->score) }}" placeholder="Score">
                  @error('score') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
                
            
              <div class="form-group @error('explanation') has-danger @enderror">
                  <label class="col-form-label" for="explanation">Explanation</label>
                  <textarea class="form-control @error('explanation') is-invalid @enderror" cols="30" rows="8" placeholder="Explanation" id="explanation" name="explanation" >{{ old('explanation', $option->description) }}</textarea>
                  @error('explanation') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>

              <div class="form-group @error('correct') has-danger @enderror">
                  <label class="col-form-label" for="correct">Correct</label>                      
                   <select class="form-control @error('correct') is-invalid @enderror" id="correct" name="correct">
                      <option @if(old('correct' ,$option->correct) == "1") selected @endif value="1">Option 1</option>
                      <option @if(old('correct' ,$option->correct) == "2") selected @endif value="2">Option 2</option>
                      <option @if(old('correct' ,$option->correct) == "3") selected @endif value="3">Option 3</option>
                      <option @if(old('correct' ,$option->correct) == "4") selected @endif value="4">Option 4</option>
                  </select> 
                  @error('correct') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ $button_text }}</button>
            </div>
            <!-- /.card-footer -->
        </form>
                </div>

                 
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
<script>
  $(function() {
    $('input[name="questionCategory"]').on('click', function() {
        if ($(this).val() == 1) {
            $('.image-list').show();
            $('.text-list').hide();

        }
        else {
            $('.image-list').hide();
            $('.text-list').show();

        }
    });
});
</script>
@endsection