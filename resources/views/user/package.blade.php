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
  <a href="#">Dashboard</a>
  <a href="#">Subscriptions</a>
  <a href="{{ route('user.progress', $user->id) }}">Progress</a>
  <a href="{{ route('user.package', $user->id) }}">Package</a>
  <a href="#">My Ebooks</a>
  <a href="#">My Reports</a>
  <a href="#">My Profile</a>
  <a href="#">Reviews</a>
  <a href="#">Student Tickets</a>
</div>
<br>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Package</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 60vh;">
            <table id="dataTable" class="table table-head-fixed text-nowrap">
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
                 
                    <td>{{ $loop->iteration }}</td>
                    <td>
                    
                        {{ $pkg->package_name }} 
                     </td>
                     
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