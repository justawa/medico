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

  <br>
  <h2></h2>
<hr></hr>

<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class = row>
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
        <h4 class="card-title"><strong>Progress</strong></h4>
    </div>
       
       
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
                  <td> {{$usr->name}}</td>
                      
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