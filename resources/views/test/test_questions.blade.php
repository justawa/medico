@extends('layouts.dashboard')

@section('title', 'Add Test')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Questions to the Test</h3>
              </div>
              <!-- /.card-header -->
            <form method="POST" action="{{ route('test.questions.store') }}">
              @csrf
              <div class="card-body">
                <div class="form-group @error('test') has-danger @enderror">
                  <label class="col-form-label" for="test">Test</label>
                  <select class="form-control @error('test') is-invalid @enderror" id="test" name="test">
                    @foreach($tests as $test)
                    <option @if(old('test') == $test->id) selected="selected" @endif value={{ $test->id }}>{{ $test->name }}</option>
                    @endforeach
                  </select>
                  @error('test') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <label class="radio-inline"><input type="radio" name="questionCategory" value="all" checked>&nbsp;All</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="questionCategory" value="subject wise">&nbsp;Subject Wise</label>

                <div class="subject-list d-none">
                  @foreach($subjects as $subject)
                    <label class="checkbox-inline"><input type="checkbox" name="subject" value="{{ $subject->id }}">&nbsp;{{ $subject->name }}</label>&nbsp;&nbsp;
                  @endforeach
                </div>

                <div class="question">
                  <div class="form-group">
                    <label class="col-form-label">Question</label>
                    <select class="form-control" name="question[]">
                      <option value="" selected disabled>Select Question</option>
                      @foreach($questions as $question)
                      <option value={{ $question->id }}>{{ $question->content }}</option>
                      @endforeach
                    </select>
                  </div>
                  <hr/>
                </div>

                <div id="more-questions"></div>

                <button type="button" id="btn-add-more-question" class="btn btn-success float-right">+ Add More Question</button>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Questions to Test</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


@section('scripts')
  <script>
    $(document).ready(function(){
      let selectedSubjects = [];

      $('input[name="questionCategory"]').on("change", function() {
        if($(this).val() == "subject wise") {
          $(".subject-list").removeClass("d-none");
        } else {
          // setting selectedSubjects array to empty
          selectedSubjects = [];
          // clearing all the selected subject checkbox
          $('input[name="subject"]').prop('checked', false);
          // hiding the subjects list
          $(".subject-list").addClass("d-none");
          // fetching questions
          getQuestions(selectedSubjects);
        }
      })
      
      $("#btn-add-more-question").on("click", function(){
        $("#more-questions").append(`
          <div class="question">
            <div class="form-group">
                <label class="col-form-label">Question</label>
                <select class="form-control" name="question[]">
                </select>
            </div>
            <button class="btn btn-danger btn-remove-question">Remove</button>
            <hr/>
          </div>
        `);

        getQuestions(selectedSubjects);
      });

      $(document).on("click", ".btn-remove-question", function(){
        $(this).parent().remove();
      });

      $('input[name="subject"]').on("change", function() {
        const currentSubject = $(this).val();
        // if the checkbox is checkbox add the subject to selectedSubject array
        if($(this).is(":checked")) {
          selectedSubjects.push(currentSubject);
        } else {
          // find the index of the current subject (ie the subject to be removed from selectedSubject array)
          var indexToRemove = selectedSubjects.indexOf(currentSubject);
          // if the index is greater than -1 (ie if it is found) "splice" the array
          if(indexToRemove > -1) {
            selectedSubjects.splice(indexToRemove, 1);
          }
        }
        getQuestions(selectedSubjects);
      });

      function getQuestions(subjects=[]) {
        $.ajax({
          method: "GET",
          url: "{{ route('subject.wise.questions') }}",
          data: {
            subjects: subjects
          },
          success: function(response) {
            $('select[name="question[]"]').last().html("")
            $('select[name="question[]"]').last().append(`<option value="" selected disabled>Select Question</option>`);
            if(response.success){
              const qLen = response.questions.length;
              for(let i=0; i<qLen; i++){
                $('select[name="question[]"]').last().append(`<option value=${response.questions[i].id}>${response.questions[i].content}</option>`);
              }
            }
          }
        });
      }
    });
  </script>
@endsection