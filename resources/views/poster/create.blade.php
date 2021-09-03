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
<h6 class="alert alert-success">{{session('status')}}</h6>
@endif
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
    <div class="form-group> 
      <label class="col-form-label" for="title">Title </label>
    <input type="text" class="form-control" name="title" autofocus required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="link">Link</label>
    <input type="text" class="form-control" name="link" autocomplete="on" required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="Image">Image</label>
      <input type="file" class="form-control" name="profile_image"required><br>
    </div>
    {{-- <div class="form-group>
      <label class="col-form-label" for="category">Category</label>
      <select name="category" class="form-control" required>
        <option value="" disabled selected>Choose option</option>
        <option value="1">HomePage</option>
        <option value="2">Events</option>
        <option value="3">News</option>
    </select>
    </div> --}}
    <br>
    {{-- <div class="form-group>
      <label class="col-form-label" for="discription">Description</label>
    <input type="text" class="form-control" name="discription"required><br>
    </div> --}}
    <div class="form-group>
      <label class="col-form-label" for="status">status</label>
      <select name="status" class="form-control" required>
        <option value="" disabled selected>Choose option</option><br>
        <option value="1">Active</option>
        <option value="0">Deactive</option>
      </select>
    </div>
   </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Add Banner</button> 
    </div>
</form>

@endsection

