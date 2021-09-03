@extends('layouts.dashboard')
@section('content')

<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class = row>
    <div class="col-12">
    <div class="card card-primary">
    <div class="card-header">
     <h4 class="card-title"><strong>New User</strong></h4>
    </div>
         
<div class="card-body">
    @if (session('status'))
    <h5 class="alert alert-success">{{session('status')}}</h5>
    @endif

      <form action="{{ route('newuser.store')}}" method="post"> 
		     @csrf
            
             <div class="form-group">
			        <label class="col-form-label">Name</label>
			        <input type="text"  placeholder="Enter Your Name" name="name" class="form-control" >
             </div>

                <div class="col-6 ">
                 <div class="form-group">
				          <label class="col-form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter email"  name="email" >
                 </div>
                </div>

                <div class="col-6 ">
                    <div class="form-group">
                      <label class="col-form-label">Password</label>
                       <input type="password"  placeholder="Enter Your password"  name="password" class="form-control" >
                    </div>
                  </div>

                <div class="col-6 ">                                 			   			  				   
                 <button type="submit" class="btn btn-primary">Add user</button>
				        </div>
                         
				</div>
           </form>

           </div>
        </div>
		   

</div>		   
</div>
</div>
</div>
</section>

@endsection