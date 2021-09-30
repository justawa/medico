@extends('layouts.dashboard')
@php
  $title = "Add Test";
  $button_text = "Add Test";
  if($test->exists) {
    $title = "Edit Test";
    $button_text = "Update Test";
  }
@endphp

      @section('title', $title)

      @section('content')
      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
      <div class="card card-primary">
      <div class="card-header"><h3 class="card-title">{{ $title }}</h3></div>
      <!-- /.card-header -->
      <div class="card-body">
                @if($test->exists)
                <form method="POST" action="{{ route('test.update', $test) }}">
                @method('put')
                @else
                <form method="POST" action="{{ route('test.store') }}">
                @endif
                @csrf
                 {{-- <div class="form-group @error('type') has-danger @enderror">
                    <label class="col-form-label" for="type">Type</label>
                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                        <option @if(old('type', $test->type) == 'preparation') selected="selected" @endif value="preparation">Preparation</option>
                        <option @if(old('type', $test->type) == 'mock') selected="selected" @endif value="mock">Mock</option>
                        <option @if(old('type', $test->type) == 'grand') selected="selected" @endif value="grand">Grand</option>
                    </select>
                    @error('type') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>  --}}
                {{-- type --}}
      <label class="radio-inline"><input type="radio" name="type" value="p" checked>&nbsp; Preparation</label>                
      <label class="radio-inline"><input type="radio" name="type" value="m">&nbsp;MOCK</label>&nbsp;&nbsp;
      {{-- Package --}}
      <div class="form-group @error('package') has-danger @enderror">
      <label class="col-form-label" for="package">Package</label>
      <select class="form-control @error('package') is-invalid @enderror" id="package" name="package">                     
      @foreach($packages as $package)
      <option @if(old('package', $test->package_id) == $package->id) selected="selected" @endif value={{ $package->id }}> {{ $package->name }}</option>
      @endforeach
      </select>
      @error('package') <span class="invalid-feedback">{{ $message }}</span> @enderror
      </div>

      {{--name  --}}
      <div class="form-group @error('name') has-danger @enderror">
      <label class="col-form-label" for="name">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $test->name) }}" placeholder="Test Name" required autofocus>
      @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
      </div>

      {{-- summary --}}
      <div class="form-group @error('summary') has-danger @enderror">
      <label class="col-form-label" for="summary">Summary</label>
      <textarea class="form-control @error('summary') is-invalid @enderror" cols="30" rows="8" placeholder="Test Summary" id="summary" name="summary" >{{ old('summary', $test->summary) }}</textarea>
      @error('summary') <span class="invalid-feedback">{{ $message }}</span> @enderror
      </div>

      {{-- Type --}}
      <div class="type-list" style="display: none">                  
        <div class="form-group @error('total_questions') has-danger @enderror">                                      
        <label class="col-form-label" for="total_questions">Total Mock Questions</label>
        <input type="text" class="form-control @error('total_questions') is-invalid @enderror" id="total_questions" name="total_questions"
        value="{{ old('total_questions', $test->total_questions) }}" placeholder="Total Mock Questions">                    
        @error('total_questions') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="type2-list" style="display: show">                  
         <div class="form-group">                                
         <label class="col-form-label" for="preparation_question">Total Preparation Questions</label>
         <input type="text" class="form-control" id="total_questions" name="total_questions"
         value="{{ old('prepration_questions', $test->total_questions) }}"
         placeholder="Total Prepration Questions">                                      
         </div>
      </div>

      <div class="form-group @error('score') has-danger @enderror">
          <label class="col-form-label" for="score">Score</label>
          <input type="text" class="form-control @error('score') is-invalid @enderror" id="score" name="score" value="{{ old('score', $test->score) }}" placeholder="Score (default 10)" required>
          @error('score') <span class="invalid-feedback">{{ $message }}</span> @enderror
      </div>

      <div class="form-group @error('duration') has-danger @enderror">
        <label class="col-form-label" for="duration">Duration</label>
        <div class="input-group mb-3">
        <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $test->duration) }}" placeholder="Duration (in minutes)" required>
        <div class="input-group-append">
        <span class="input-group-text">minutes</span>
        </div>
        </div>
        @error('duration') <span class="invalid-feedback">{{ $message }}</span> @enderror
      </div>         

      <div class="form-group">
        <div class="checkbox">
        <label>
        <input type="checkbox" id="published" name="published" value="1" @if(old('published', $test->published) == 1) checked @endif>
        Publish?
        </label>
        </div>
        </div>
      </div>         
             
       <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ $button_text }}</button>
       </div>
              
      </form>
      </div>
      </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
  $(function() {
    $('input[name="type"]').on('click', function() {
        if ($(this).val() == 'm') {
            $('.type-list').show();
            $('.type2-list').hide();

        }
        else {
            $('.type-list').hide();
            $('.type2-list').show();

        }
    });
});
</script>
@endsection