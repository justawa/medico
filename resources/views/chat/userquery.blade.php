@extends('layouts.dashboard')

@php
  $title = "User Query";
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

@if (session('status'))
<h6 class="alert alert-success">{{session('status')}}</h6>
@endif


<form action="" method="POST" >
    @csrf
    <div class="card-body">
    <br>
    <div class="form-group>
      <label class="col-form-label" for="userid">userid</label>
<<<<<<< HEAD
      <input type="hidden" class="form-control" name="user_id" value="1" required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="question">Subject</label>
      <input type="hidden" class="form-control" name="subject" value="test" required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="question">Description</label>
      <textarea type="hidden" class="form-control" name="description" value="test" required></textarea><br>
    </div>
   </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">CHECK</button> 
=======
    <input type="hidden" class="form-control" name="userid" value="1" required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="question">question</label>
    <input type="hidden" class="form-control" name="question" value="test" required><br>
    </div>
   </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">CHECK</button> 
>>>>>>> 1e3b6fe0d20df0167d0391cf14bf3d0f4e42e782
    </div>
</form>

@endsection
