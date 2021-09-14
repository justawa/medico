@extends('layouts.dashboard')

@php
  $title = "Edit package";
  $button_text = "Update package";
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
                     
              <form method="post" action="{{url('/packages/update/'.$Packages->id)}}">
                @csrf
                @method('PUT')
               <div class="card-body">
                <div class="form-group @error('name') has-danger @enderror">
                    <label class="col-form-label" for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $Packages->name) }}" placeholder="Package Name" required>
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group @error('summary') has-danger @enderror">
                    <label class="col-form-label" for="summary">Type</label>
                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                      <option @if(old('type' ,$Packages->type) == "MERGED") selected @endif value="MERGED">MERGED</option>
                      <option @if(old('type' ,$Packages->type) == "SOLITORY") selected @endif value="SOLITORY">SOLITORY</option>                                   
                  </select> 
                    @error('summary') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group @error('name') has-danger @enderror">
                    <label class="col-form-label" for="name">No Of Question</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                     id="no_of_question" name="no_of_question" value="{{ old('no_of_question', $Packages->no_of_question) }}" required>
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group @error('name') has-danger @enderror">
                  <label class="col-form-label" for="name">Price</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="price" name="price" placeholder="price" value="{{ old('price', $Packages->price) }}" required>
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