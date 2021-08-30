@extends('layouts.dashboard')

@php
  $title = "Edit";
  $button_text = "Edit-Image";

@endphp

@section('title', $title)
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $button_text }}</h3>
              </div>

@if (session('status'))
<h5 class="alert alert-success">{{session('status')}}</h5>
@endif
<form action="{{url('update-image/'.$poster->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   
    <div class="form-group> 
      <label class="col-form-label" for="title">Title</label><br>
    <input type="text" class="form-control" name="title" value="{{$poster->title }}"> <br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="link">Link</label><br>
    <input type="text" class="form-control" name="link"  value="{{$poster->link }}"><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="Image">Image</label><br>
    <input type="file" class="form-control" name="profile_image" value="{{$poster->profile_image}}" required><br>
    <img src="{{asset('uploads/banner/'.$poster->profile_image)}} " width="100px" alt="image">
    </div>
    <div class="form-group>
      <label class="col-form-label" for="category">Category</label><br>
      <select name="category" class="form-control"  " >
        <option value="{{$poster->category }}">Choose option</option>
        <option value="1">HomePage</option>
        <option value="2">Events</option>
        <option value="3">News</option>
    </select>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="discription">Description</label><br>
    <input type="text" class="form-control" name="discription"  value="{{$poster->discription }}"><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="status">status</label><br>
      <select name="status" class="form-control">
        <option value="{{$poster->status }}">Choose option</option>
        <option value="1">Active</option>
        <option value="0">Deactive</option>
      </select>
    </div>
   
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update</button> 
    </div>
</form>

@endsection

