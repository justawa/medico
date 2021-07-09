@extends('layouts.dashboard')

@php
  $title = "Add Banner";
  $button_text = "Add Banner";

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
<h5 class="alert alert-success">{{session('status')}}</h5>
@endif
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group> 
      <label class="col-form-label" for="title">Title</label><br>
    <input type="text" name="title" required> <br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="link">Link</label><br>
    <input type="text" name="link"required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="Image">Image</label><br>
    <input type="file" name="profile_image"required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="category">Category</label><br>
      <select name="category">
        <option value="" disabled selected>Choose option</option>
        <option value="1">HomePage</option>
        <option value="2">Events</option>
        <option value="3">News</option>
    </select>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="discription">Description</label><br>
    <input type="text" name="discription"required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="status">status</label><br>
    <input type="text" name="status" placeholder="status"required><br>
    </div>
   
    <div class="card-footer">
    <button type="submit">Save</button> 
    </div>
</form>

@endsection

