@extends('resturant.layout.app')

@section ('content')
<div class="content-wrapper">
          <div class="row">
		  <div class="col-md-2">
		  </div>
            
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add banner</h4>
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
                  <form class="forms-sample" action="{{route('resturantAddNewbannervendor')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                    <label for="exampleFormControlSelect3">banner</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3 " name="bannerloc_id">
                      @foreach($category as $category)
		          	<option value="{{$category->resturant_cat_id}}">{{$category->cat_name}}</option>
		              @endforeach
                      
                      
                    </select>
                    </div>
                  
                     <div class="form-group">
                      <label>banner Image</label>  
                      
                      <div class="input-group col-xs-12">
                      <input type="file" name="banner_image"  class="file-upload-default">                        
                        </div>
                      </div>
                      @if (permission('update-banner'))
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    @endif
                    <!--
                    <button class="btn btn-light">Cancel</button>
                    -->
                     <a href="{{route('bannervendor')}}" class="btn btn-light">Cancel</a>
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