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
    <a class="active" href="{{url('progress')}}"> Progress </a>
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
            <th scope="col">S No.</th>
                
            <th scope="col">All User</th>

            </tr>
        </thead>
          <tbody>
              
              @foreach ($users as $usr )
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>
                       {{$usr->name}}</td>
                      
                    </tr>
                      @endforeach
          </tbody>
         
                    {{-- <textarea class="form-control" id="reply" name="reply" placeholder="Type here..." cols="15" rows="6"></textarea> --}}
                  

</table>             
</div> 
</div>
</div>
</div>
</div>		   
</section>
@endsection