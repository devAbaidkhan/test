@extends('resturant.layout.app')

@section ('content')
<div class="content-wrapper">
          <div class="row">
		  <div class="col-md-2">
		  </div>
            
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Delivery Boy</h4>
                   @if (count($errors) > 0)
                      @if($errors->any())
                        <div class="alert alert-primary" role="alert">
                          {{$errors->first()}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                      @endif
                  @endif
                  <form class="forms-sample" action="{{route('resturantAddNewdelivery_boy')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                 
                    <div class="form-group">
                      <label for="delivery_boy_name">Delivery Boy Name</label>
                      <input type="text" class="form-control" id="delivery_boy_name" name="delivery_boy_name" placeholder="Enter delivery_boy name" required>
                    </div>
                     <div class="form-group">
                      <label>Delivery Boy Image</label>  
                      
                      <div class="input-group col-xs-12">
                      <input type="file" name="delivery_boy_image"  class="file-upload-default">                        
                        </div>
                      </div>
                      
                     <div class="form-group">
                      <label for="delivery_boy_phone">Delivery Boy Phone</label>
                      <input type="text" class="form-control" id="delivery_boy_phone" name="delivery_boy_phone" placeholder="Phone Number" required>
                    </div>
                    
                    
                     <div class="form-group">
                      <label for="password1">Password</label>
                      <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter password" required>
                    </div>
                    
                     <div class="form-group">
                      <label for="password2">Confirm Password</label>
                      <input type="password" class="form-control" id="password2" name="password2" placeholder="confirm password" required>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <!--
                    <button class="btn btn-light">Cancel</button>
                    -->
                     <a href="{{route('resturantdelivery_boy')}}" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
             <div class="col-md-2">
		  </div>
     
          </div>
        </div>
       </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
        	$(document).ready(function(){
        	
                $(".des_price").hide();
                
        		$(".img").on('change', function(){
        	        $(".des_price").show();
        			
        	});
        	});
</script>
<script>
// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
@endsection