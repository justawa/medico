@extends('layouts.dashboard')
@section('title', 'Profile')
@section('content')
<!-- Main content -->
<hr></hr>

<section class="content">
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Update Profile</h3>
          </div>
         <form action="{{ route('user.add')}}" method="post">
		     @csrf

             <div class="form-group">
			        <input type="text"  placeholder="Enter Your Name" hidden name="id" value={{ $user->id}} class="form-control"  autocomplete="off">
                   </div>
			 <div class = card-body>
               <div class="form-group">
			         <label class="col-form-label" for="name">Name</label>
                     <input type="text"  placeholder="Enter Your Name"  name="name" value={{ $user->name}} @error('name') is-invalid @enderror" class="form-control"  autocomplete="off">
                   </div>
                   </div>
                
                   <div class = card-body>
                <div class="form-group">
				    <label>Email</label>
                     <input type="email" class="form-control" placeholder="Enter email"  name="email" value={{ $user->email}} autocomplete="off">
                </div>
                </div>
			    
                <div class = card-body>
               <div class="form-group">
				    <label>Package</label>
                    @foreach($user->packages as $package)
                   <input type="text" class="form-control" placeholder="Enter email"  name="package" value={{ $package->name }} autocomplete="off">
                   @endforeach
               </div>
               <div>
               
               <div class = card-body>
               <div class="form-group">
				   <label>Phone</label>
                   @foreach($detail as $detail)
                   <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile" value={{ $detail->Phone}} required autocomplete="off">
                   @endforeach
               </div>
               </div>
                
               <div class = card-body>
			   <div class="form-group" >
			       <label>Select Gender</label>
             
                <select class="form-control @error('gender') is-invalid @enderror" name="gender" >
                 <option @if(old('gender', $detail->Gender) == 'Male') selected  @endif  value = "Male">Male</option>
                 <option @if(old('gender', $detail->Gender) == 'Female') selected  @endif value = "Female">Female</option>
                 <option @if(old('gender', $detail->Gender) == 'Others') selected  @endif value = "Others">Others</option>
                 </select>
                 
                 </div>
                 </div>
				 
                 <div class = card-body>
				 <div class="form-group">
                   <label>Qualification</label>
                   <select class="form-control @error('qualification') is-invalid @enderror" name="qualification">
                   <option @if( $detail->Qualification == 'Secondery Education') selected  @endif  value="Secondery Education">Secondery Education</option>
                   <option @if( $detail->Qualification == 'Graduation') selected  @endif  value="Graduation">Graduation</option>
                   <option @if( $detail->Qualification == 'Post Graduation') selected  @endif  value="Post Graduation">Post Graduation</option>
                
                   </select>
                   </div>
                   </div>
				   
                   <div class = card-body>
				   <label>Address</label>
                 <div class="form-group">
                 
                <textarea cols="5" rows="5" class="form-control" placeholder="Enter Your Address"  name="address" value={{$detail->Address}} required autocomplete="off">{{ $detail->Address}}</textarea>
                    
               </div>
               </div>
                   
               <div class = card-body>
				   <div class="form-group">
				      <label>City</label>
              
                       <input type="text" class="form-control" placeholder="Enter Your City" id="city" name="city" value={{$detail->City}} required autocomplete="off">
                       
               </div>
               </div>
			   
               <div class = card-body>
			       <div class="form-group">
				      <label>State</label>
                   <input type="text" class="form-control" placeholder="Enter Your State" id="state" name="state" value={{$detail->state}} required autocomplete="off">
               </div>
               </div>
               
               <div class = card-body>
			       <div class="form-group">
				   <label>Country</label>
                   <input type="text" class="form-control" placeholder="Enter Your Country" id="country" name="country" value={{$detail->Country}} required autocomplete="off">
               </div>
               </div>
			   
               <div class = card-body>
			     <div class="form-group">
				<label>Zipcode</label>
                   <input type="text" class="form-control" placeholder="Enter Zipcode" id="city" name="zipcode" value={{$detail->Zipcode}} required autocomplete="off">
               </div>
               </div>
			   
               <div class = card-body>
			    <label> Password</label>
                 <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" id="pass"
                       name="pass" value={{$detail->Password}}  required autocomplete="off">
               </div>
               </div>
			   
			   <div class="card-footer">
				   <div class="d-flex justify-content-center form-button">
                 <button type="submit" class="btn btn-primary">update Profile</button>
				 </div>
                 </div>
				
           </form>
		   
</div>
</div>		   



</div>
</div>
</section>

@endsection