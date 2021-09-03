@extends('layouts.dashboard')

@php
  $title = "Payment Data";
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


<form action="" method="POST" >
    @csrf
    <div class="card-body">
    <div class="form-group>
      <label class="col-form-label" for="pid">package ID</label>
    <input type="hidden" class="form-control" name="pid" value="test" autocomplete="on" required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="studentid">Student ID</label>
      <input type="hidden" class="form-control" name="studentid" value="test" autocomplete="on" required><br>
    </div>
    <br>
    <div class="form-group>
      <label class="col-form-label" for="student_id">Student ID</label>
      <input type="hidden" class="form-control" name="student_id" value="7" autocomplete="on" required><br>
    </div>
    <br>

    <div class="form-group>
      <label class="col-form-label" for="amount">Amount</label>
    <input type="hidden" class="form-control" name="amount" value="1" required><br>
    </div>
    <div class="form-group>
      <label class="col-form-label" for="status">status</label>
    <input type="hidden" class="form-control" name="status" value="1" required><br>
    </div>
   </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">CHECK</button> 
    </div>
</form>

@endsection
