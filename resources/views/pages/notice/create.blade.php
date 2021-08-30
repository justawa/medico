@extends('layouts.dashboard')

@php
  $title = "Add Notice";
  $button_text = "Add Notice";

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
      <label class="col-form-label" for="notice">Notice </label>
    <input type="text" class="form-control" name="notice" autofocus required><br>
    </div>

    <br>
    <div class="form-group>
      <label class="col-form-label" for="tag">Tag</label>
    <input type="text" class="form-control" name="tag"required><br>
    </div>

   </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Add Notice</button> 
    </div>
</form>

@endsection

