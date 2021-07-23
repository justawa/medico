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
            <th scope="col">ID</th>
            <th scope="col">Package</th>
            <th scope="col">All User</th>
            </tr>
        </thead>
          <tbody>
            @foreach($package as $package)
            <tr>
              <td>  <a href="">{{ $package->id }}</a>  </td>
               <td>  <a href="">{{ $package->name }}</a>  </td>
               <td>  </td>
         
              </tr>
                @endforeach
          </tbody>
       
          </table> 
          
          <?php 
          $c=0;
          ?>

         
                  @foreach($progress as $progress)
                  <tr>
                  
                    <td> {{$progress->user_id}}
                    {{-- <?php   $c=$c+1; ?> --}}
                    </td>

                    <td> {{-- {{$progress->package_id}} --}}</td>
                    
                  </tr>
                  @endforeach

                 

                  {{-- <?php 
                  // echo "total student = ";
                  // echo $c;
                  ?> --}}
</div> 
</div>
</div>
</div>
</div>		   
</section>
@endsection