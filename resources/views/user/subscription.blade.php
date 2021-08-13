@extends('layouts.dashboard')
@section('content')
<style>

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #ddd;
  color: black;
}

</style>
<div class="topnav">
    <a href="{{ route('user.index') }}">Dashboard</a>
    <a class="active" href="#">Subscriptions</a>
    <a href="{{ route('user.progress', $user->id) }}"> Progress </a>
    <a href="{{ route('user.package', $user->id) }}">Package</a>
    <a href="{{ route('user.ebook', $user->id) }}">My Ebooks</a>
    <a href="{{ route('user.report', $user->id) }}">My Reports</a>
    <a  href="{{ route('user.edit', $user->id) }}">My Profile</a>
    <a href="{{ route('user.review', $user->id) }}">Reviews</a>
    <a href="{{ route('user.tickets' ,$user->id ) }}">Student Tickets</a>
  </div>
  <br>

<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class = row>
    <div class="col-12">

      <div class="card card-primary">
        <div class="card-header">
        <h4 class="card-title"><strong>Subscription</strong></h4>
    </div>
       
      <div class="card-body">

        <h4>Work In Progress..</h4>
        {{-- <table id="dataTable" class="table table-striped">
          <thead>
              <tr>
              <th scope="col">ID</th>
              <th scope="col">Package</th>
              </tr>
          </thead>
          <tbody>
            @foreach($sub as $s)
            <tr>
              <td>  <a href="">{{ $s->package_id }}</a>  </td>
               <td>  <a href="">{{ $s->name }}</a>  </td>
              </tr>
                @endforeach
          </tbody>
          </table>     --}}
       
                
</div> 
</div>
</div>
</div>
</div>		   
</section>
@endsection