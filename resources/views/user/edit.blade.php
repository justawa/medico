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

<div class="topnav">
  <a href="#">Dashboard</a>
  <a href="#">Subscriptions</a>
  <a href="#">My Ebooks</a>
  <a href="#">My Reports</a>
  <a class="active" href="#">My Profile</a>
  <a href="#">Reviews</a>
  <a href="#">Student Tickets</a>
</div>
<br>

<h2>Profile</h2>
<hr></hr>

<section class="content">
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
      <div class = row>
      <div class="col-6">
      <form action="{{ route('user.store')}}" method="post">
		     @csrf
            
             <div class="form-group">
			        <input type="text"  placeholder="Enter Your Name" hidden name="id" value="{{ $user->id}}" class="form-control"  autocomplete="off">
                   </div>
			 
               <div class="form-group">
			         <label class="col-form-label">Name</label>
                     <input type="text"  placeholder="Enter Your Name"  name="name" value="{{ $user->name}}" class="form-control"  autocomplete="off">
                   </div>
                   
                
                   
                <div class="form-group">
				    <label>Email</label>
                     <input type="email" class="form-control" placeholder="Enter email"  name="email" value="{{ $user->email}}" autocomplete="off">
                </div>
                
			    
             
                

                 
                
                 <div class="form-group ">
                   <label for="">Package</label>
                   <select name="package[]" multiple class=" form-control @error('packages') is-invalid @enderror">
                    
                  @foreach($packages as $package)
                 
                  <option value = "{{ $package->id }}"  @foreach($user->packages as $pkg) @if($package->id == $pkg->id) selected @endif  @endforeach>{{ $package->name }}</option>
                  
                  @endforeach 
                  
                </select>
                  </div> 


                
                @if(!Empty($detail)); 
               <div class="form-group">
				        <label>Phone</label>
                 
                   <input type="text" class="form-control" placeholder="Enter Mobile Number" name="phone" value="{{$detail->phone}}" required autocomplete="off">
                
               </div>
              
               
			          <div class="form-group" >
			          <label>Select Gender</label>

                <select class="form-control @error('gender') is-invalid @enderror" name="gender" >
                
                 <option @if($detail->gender == 'Male') selected  @endif  value = "Male">Male</option>
                 <option @if($detail->gender == 'Female') selected  @endif value = "Female">Female</option>
                 <option @if($detail->gender == 'Others') selected  @endif value = "Others">Others</option>
                 </select>
                 
                 </div>
                 
                 <div class="form-group">
                   <label>Qualification</label>
                   <select class="form-control @error('qualification') is-invalid @enderror" name="qualification">
                   <option @if( $detail->qualification == 'Secondery Education') selected  @endif  value="Secondery Education">Secondery Education</option>
                   <option @if( $detail->qualification == 'Graduation') selected  @endif  value="Graduation">Graduation</option>
                   <option @if( $detail->qualification == 'Post Graduation') selected  @endif  value="Post Graduation">Post Graduation</option>
                
                   </select>
                   </div>

                   
				   
                   
                 
				     
      
      </div>
      <div class="col-6 ">
      
     
				   
             <div class="form-group">
               <label>Address</label>
                <textarea cols="5" rows="5" class="form-control" placeholder="Enter Your Address"  name="address" required autocomplete="off">{{ $detail->address}}</textarea>
                </div>
               
                   
               
				   <div class="form-group">
				      <label>City</label>
               <input type="text" class="form-control" placeholder="Enter Your City" id="city" name="city" value="{{$detail->city}}" required autocomplete="off">
                       
               </div>
               
			   
               
			       <div class="form-group">
				      <label>State</label>
                   <input type="text" class="form-control" placeholder="Enter Your State" id="state" name="state" value="{{$detail->state}}" required autocomplete="off">
               </div>
               
               
               
			       <div class="form-group">
				   <label>Country</label>
                   <input type="text" class="form-control" placeholder="Enter Your Country" id="country" name="country" value="{{$detail->country}}" required autocomplete="off">
               </div>
               
			   
               
			     <div class="form-group">
				<label>Zipcode</label>
                   <input type="text" class="form-control" placeholder="Enter Zipcode" id="city" name="zipcode" value="{{$detail->zipcode}}" required autocomplete="off">
               </div>
               @else
			  
         
               <div class="form-group">
				        <label>Phone</label>
                   <input type="text" class="form-control" placeholder="Enter Mobile Number" name="phone" value="" required autocomplete="off"> 
               </div>
               
                
               
			      <div class="form-group">
			          <label>Select Gender </label>

                <select class="form-control @error('gender') is-invalid @enderror" name="gender" >
                 <option value = "Male">Male</option>
                 <option value = "Female">Female</option>
                 <option  value = "Others">Others</option>
                 </select> 
              </div>

              <div class="form-group">
                   <label>Qualification</label>
                   <select class="form-control @error('qualification') is-invalid @enderror" name="qualification">
                   <option  value="Secondery Education">Secondery Education</option>
                   <option  value="Graduation">Graduation</option>
                   <option  value="Post Graduation">Post Graduation</option>
                
                   </select>
                   </div>
                    
				 </div>
         <div class="col-6">

                 
				 
                   <div class="form-group">     
				           <label>Address</label>
                   <textarea cols="5" rows="5" class="form-control" placeholder="Enter Your Address"  name="address" value="" required autocomplete="off"></textarea>
                    </div>
               
                   
               
				       <div class="form-group">
				            <label>City</label>
                    <input type="text" class="form-control" placeholder="Enter Your City" id="city" name="city" value="" required autocomplete="off">
                      </div>
               
			   
               <div class="form-group">
				          <label>State</label>
                   <input type="text" class="form-control" placeholder="Enter Your State" id="state" name="state" value="" required autocomplete="off">
               </div>
               
               
               
			       <div class="form-group">
				        <label>Country</label>
                   <input type="text" class="form-control" placeholder="Enter Your Country" id="country" name="country" value="" required autocomplete="off">
               </div>
               
			   
               
			     <div class="form-group">
				<label>Zipcode</label>
                   <input type="text" class="form-control" placeholder="Enter Zipcode" id="city" name="zipcode" value="" required autocomplete="off">
               </div>
               

         
               @endif
              
			   
			  
				   
                 <button type="submit" class="btn btn-primary">update Profile</button>
				 </div>
                
				
      
      
         
				</div>
           </form>

           </div>
        </div>
		   

</div>		   



</div>
</div>
</section>

@endsection