@extends('layouts.dashboard')

@php
  $title = "Edit";
  $button_text = "Edit-Notice";

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
<form action="{{url('update-n/'.$Notice->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   
    <div class="form-group> 
      <label class="col-form-label" for="title">Notice</label><br>
    <input type="text" class="form-control" name="notice" value="{{$Notice->notice }}"> <br>
    </div>
   
   
   

      <div class="form-group>
        <label class="col-form-label" for="percent">tag</label>
      <input type="text" class="form-control" name="tag" value="{{$Notice->tag}}" required> <br>
      </div>
   
   
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update</button> 
    </div>
</form>

@endsection

