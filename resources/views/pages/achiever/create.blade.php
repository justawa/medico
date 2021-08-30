@extends('layouts.dashboard')

@php
  $title = "Add Rankers";
  $button_text = "Add Rankers";

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
      <label class="col-form-label" for="Name">Name </label>
    <input type="text" class="form-control" name="name" autofocus required><br>
    </div>
   
    <div class="form-group>
      <label class="col-form-label" for="Image">Image</label>
      <input type="file" class="form-control" name="profile_image"required><br>
    </div>
   
    <br>
    <div class="form-group>
      <label class="col-form-label" for="percent">Percentage</label>
    <input type="text" class="form-control" name="percent"required><br>
    </div>
   
   </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Add Rankers</button> 
    </div>
</form>

@endsection

