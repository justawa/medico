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
<!-- Main content -->
{{-- {{$user->id}} --}}
<div class="topnav">
  <a href="{{ route('user.index') }}">Dashboard</a>
  <a href="{{ route('user.subscription', $user->id) }}">Subscriptions</a>
  {{-- <a href="{{ route('user.progress', $user->id) }}">Progress</a> --}}
  <a  class="active" href="{{ route('user.package', $user->id) }}">Package</a>
  <a href="{{ route('user.ebook', $user->id) }}">My Ebooks</a>
  <a href="{{ route('user.report', $user->id) }}">My Reports</a>
  <a  href="{{ route('user.edit', $user->id) }}">My Profile</a>
  <a href="{{ route('user.review', $user->id) }}">Reviews</a>
  <a href="{{ route('user.tickets' , $user->id) }}">Student Tickets</a>
</div>
<br>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class = row>
          <div class="col-12">
        
          <div class="card card-primary">
            <div class="card-header">
            <h4 class="card-title"><strong>Package</strong></h4>
        </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table id="dataTable" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  
                  <th>Packages</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               
                @foreach ($pkg_users as $pkg)
               
                <tr>
                 
                    <td><a href="">{{ $loop->iteration }}</a></td>
                    <td><a href=""> {{ $pkg->package_name }}</a></td>
                     
                     <td>{{ $pkg->active ? 'Active' : 'Not Active'}}</td>
                     <td><a href="{{ route('package.update.status',$pkg->pkg_users_id) }}" class="btn btn-default btn-sm" 
                      onclick="event.preventDefault();
                      document.getElementById('status-update-form{{ $pkg->pkg_users_id }}').submit();">
                    {{ $pkg->active ? 'Deactivate' : 'Activate' }}
                  </a>
                  <form id="status-update-form{{ $pkg->pkg_users_id }}" action="{{ route('package.update.status', $pkg->pkg_users_id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="status" value="{{ $pkg->active ? 0 : 1 }}" />
                  </form></td>
                  
                </tr>
                 @endforeach            
               
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
@endsection