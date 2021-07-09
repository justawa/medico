@extends('layouts.dashboard')

@php
  $title = "Add Banner";
  $button_text = "Add Images";

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
              
                <button>

                  <a href="{{ url('add-image')}}" class="btn btn-primary float end">Add Images</a>
                </button>

@endsection

