@extends('layouts.dashboard')

@php
  $title = "Add Headline";
  $button_text = "Add Headline";

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
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
    <div class="form-group> 
      <label class="col-form-label" for="headline">HeadLine </label>
    <input type="text" class="form-control" name="headline" autofocus required><br>
    </div>
   
   </div>
   <div class="card-footer">
    <button type="submit" class="btn btn-primary">Add HeadLine</button> 
    </div>
  
</form>

@endsection

