@extends('layouts.dashboard')

@php
  $title = "Edit";
  $button_text = "Edit-Achiever";

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
<form action="{{url('update-a/'.$Achiever->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   
    <div class="form-group> 
      <label class="col-form-label" for="title">Name</label><br>
    <input type="text" class="form-control" name="name" value="{{$Achiever->name }}"> <br>
    </div>
   
    <div class="form-group>
      <label class="col-form-label" for="Image">Image</label><br>
    <input type="file" class="form-control" name="profile_image" value="{{$Achiever->profile_image}}" required><br>
    <img src="{{asset('Achiever/'.$Achiever->profile_image)}} " width="100px" alt="image">
    </div>
   
    <div class="form-group>
        <label class="col-form-label" for="percent">Percentage</label>
      <input type="text" class="form-control" name="percent" value="{{$Achiever->percent}}" required> <br>
      </div>
   
   
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update</button> 
    </div>
</form>

@endsection

