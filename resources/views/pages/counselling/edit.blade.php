@extends('layouts.dashboard')

@php
  $title = "Edit";
  $button_text = "Edit-Doctors";

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
<form action="{{url('update-c/'.$Counselling->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   
    <div class="form-group> 
      <label class="col-form-label" for="title">Name</label><br>
    <input type="text" class="form-control" name="name" value="{{$Counselling->name }}"> <br>
    </div>
   
    <div class="form-group>
      <label class="col-form-label" for="Image">Image</label><br>
    <input type="file" class="form-control" name="profile_image" value="{{$Counselling->profile_image}}" required><br>
    <img src="{{asset('Counselling/'.$Counselling->profile_image)}} " width="100px" alt="image">
    </div>
   
    <div class="form-group>
        <label class="col-form-label" for="percent">specilization</label>
      <input type="text" class="form-control" name="specilization" value="{{$Counselling->specilization}}" required> <br>
      </div>

      <div class="form-group>
        <label class="col-form-label" for="percent">place</label>
      <input type="text" class="form-control" name="place" value="{{$Counselling->place}}" required> <br>
      </div>
   
   
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update</button> 
    </div>
</form>

@endsection

