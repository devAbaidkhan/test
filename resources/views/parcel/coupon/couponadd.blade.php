@extends('parcel.layout.app')
<style>
sup {
    color:red;
    position: initial;
    font-size: 111%;
}
</style>
@section ('content')
<div class="content-wrapper">
          <div class="row">
		  <div class="col-md-2">
		  </div>
            
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Coupon</h4>
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
                  <form class="forms-sample" action="{{route('parceladdcoupon')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}

                    <div class="form-group">
                      <label for="exampleInputName1">Coupon Name<sup>*</sup></label>
                      <input type="text" class="form-control" id="exampleInputName1" name="coupon_name" placeholder="Enter product name">
                    </div>
                    
                    
                
                <div class="form-group">
                      <label for="exampleInputName1">Coupon Code</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="coupon_code" maxlength="6" placeholder="Coupon Code">
                    </div>
                   
                 <div class="form-group">
                      <label for="exampleInputName1">Coupon Description </label>
                      <input type="text" class="form-control" id="exampleInputName1" name="coupon_desc" placeholder="Coupon Description ">
                    </div>  
                   
                   <div class="form-group">
                      <label for="exampleInputName1">Start Date</label>
                      <input type="date" class="form-control" id="exampleInputName1" name="valid_to" placeholder="">
                    </div> 
            
                    <div class="form-group">
                      <label for="exampleInputName1">End Date</label>
                      <input type="date" class="form-control" id="exampleInputName1" name="valid_from" placeholder="">
                    </div>
                    
                 <div class="form-group">
                      <label for="exampleInputName1">Cart Value</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="cart_value" placeholder="Min Cart Value">
                    </div> 
                    
                    <div class="form-group">
                      <label for="cod">Discount Value</label>
                      <select class="form-control" name="coupon_type">
                          <option value="">---Select---</option>
                          <option value="percentage">Percentage</option>
                          <option value="price">Price</option>
                      </select><br>
                      
                      <input type="text" class="form-control" id="exampleInputName1" name="coupon_discount" placeholder="Enter Amount">
                    </div>
            
                    <div class="form-group">
                      <label for="exampleInputName1">User Restrictions</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="restriction" placeholder="How Many times single user Apply this coupon ?">
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <!--
                    <button class="btn btn-light">Cancel</button>
                    -->
                     <a href="" class="btn btn-light">Cancel</a>
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

@endsection