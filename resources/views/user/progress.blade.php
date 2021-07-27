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
    <a href="#">Dashboard</a>
    <a href="#">Subscriptions</a>
    <a class="active" href="{{ route('user.progress', $user->id) }}"> Progress </a>
    <a href="{{ route('user.package', $user->id) }}">Package<a>
    <a href="#">My Ebooks</a>
    <a href="#">My Reports</a>
    <a  href="{{url('/users')}}">My Profile</a>
    <a href="#">Reviews</a>
    <a href="#">Student Tickets</a>
  </div>
  <br>
  <h2>Progress</h2>
<hr></hr>

<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class = row>
    <div class="col-6">
       
      <div class="card-body">

        <table id="dataTable" class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Package</th>
            <th scope="col">No. of User</th>
            <th scope="col">All User</th>

            </tr>
        </thead>
          <tbody>
            @foreach($progress as $progres)
            <tr>
              <td>  <a href="">{{ $progres->package_id }}</a>  </td>
               <td>  <a href="">{{ $progres->name }}</a>  </td>
               <td> {{ $progres->user_count }} </td>
               <td><a href="{{ route('user.show',$progres->package_id)}}"> Show </a></td>
              </tr>
                @endforeach
          </tbody>
          </table>             
</div> 
</div>
</div>
</div>
</div>		   
</section>
@endsection