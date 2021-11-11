@extends('cityadmin.layout.app')
@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ url('assets/plugins/croppie/croppie.css') }}" />
<style>
  /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
  #maps {
    height: 500px;
  }

  .pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
  }

  #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
  }

  .pac-controls {
    display: inline-block;
    padding: 5px 11px;
  }

  .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }

  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
  }

  #pac-input:focus {
    border-color: #4d90fe;
  }
</style>
@endpush
@section ('content')
<div class="content-wrapper">
          <div class="row">
		  <div class="col-md-2">
		  </div>
            
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Partner</h4>
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
                  <form class="forms-sample" id="partner_form" action="{{route('update-vendor',$vendor->vendor_id)}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      
             <!--                 <div class="form-group">-->
             <!--       <label for="exampleFormControlSelect3">Select UI</label>-->
             <!--       <select class="form-control form-control-sm" id="exampleFormControlSelect3 " name="ui">-->
             <!--          @foreach($ui as $uis)-->
		          	<!--<option value="{{$uis->id}}" @if($uis->id == $vendor->ui_type) selected @endif>{{$uis->ui_design}}</option>-->
		           <!--   @endforeach-->
                      
                      
             <!--       </select>-->
             <!--       </div>-->
                      
                        <div class="form-group">
                    <label for="exampleFormControlSelect3">Partner Category</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3 " name="vendor_category_id">
                       @foreach($vendor_category as $category)
		          	<option value="{{$category->vendor_category_id}}" @if($category->vendor_category_id == $vendor->vendor_category_id) selected @endif>{{$category->category_name}}</option>
		              @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="vendor_name">Partner Name</label>
                      <input type="text" class="form-control" id="vendor_name" name="vendor_name" value="{{$vendor->vendor_name}}">
                     
                    <div class="form-group">
                      <label>Partner Logo</label>
                      <div class="input-group col-xs-12">
                        <input type="file" id="vendor_img" name="vendor_img" class="file-upload-default" >
                        <input type="hidden" name="vendor_image" id="vendor_image">
                        <input type="hidden" name="old_vendor_image" value="{{$vendor->vendor_logo}}" class="file-upload-default">
                      </div>
                      <div id="uploaded_vendor_image">
        <img src="{{url("$vendor->vendor_logo")}}" alt="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Title Banner</label>
                      <div class="input-group col-xs-12">
                        <input type="file" name="main_img" id="main_img" class="file-upload-default" >
                        <input type="hidden" name="main_image" id="main_image">
                        <input type="hidden" name="old_main_image" value="{{$vendor->main_image}}" class="file-upload-default">
                      </div>
                      <div id="uploaded_main_image">
                        <img src="{{url("$vendor->main_image")}}" alt="">
                      </div>
                    </div>
                    {{-- <div class="form-group">
                      
                    </div> --}}
                    <div class="form-group">
                      <label for="vendor_address">Address</label>
                      <input type="text" class="controls form-control" id="pac-input" name="pac-input">
                      <div id="maps"></div>
                      <input type="text" class="form-control" id="vendor_address" name="vendor_address"
                        placeholder="Enter Address" readonly value="{{ $vendor->vendor_loc }}">
                      <input type="hidden" name="lat" id="lat" value="{{ $vendor->lat }}">
                      <input type="hidden" name="lng" id="lng" value="{{ $vendor->lng }}">
                    </div>
        
        
                    <div class="form-group">
                      <label for="physical_address">Physical Address</label>
                      <input class="form-control" id="physical_address" type="text" name="physical_address"
                        placeholder="Place your Address" value="{{ $vendor->physical_address }}">
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Owner Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="owner_name" value="{{$vendor->owner}}">
                    </div>
                    <div class="form-group">
                      <label for="opening_time">Opening Time</label>
                      <input type="time" class="form-control" name="opening_time" value="{{$vendor->opening_time}}">
                    </div>
                    <div class="form-group">
                      <label for="closing_time">Closing Time</label>
                      <input type="time" class="form-control" name="closing_time" value="{{$vendor->closing_time}}">
                    </div>
                   
                      <div class="form-group">
                      <label for="vendor_email">Partner Email</label>
                      <input type="text" class="form-control" id="vendor_email" name="vendor_email" value="{{$vendor->vendor_email}}">
                    </div>
                     <div class="form-group">
                      <label for="vendor_phone">Partner Phone</label>
                      <input type="text" class="form-control" id="vendor_phone" name="vendor_phone" value="{{$vendor->vendor_phone}}" >
                      </div>
                      <div class="form-group">
                        <label for="avg_cost_meal">Average Cost Meal</label>
                       <select name="avg_cost_meal" id="avg_cost_meal" class="form-control" required>
                         <option selected disabled>Select options</option>
                         <option value="$" {{ $vendor->avg_cost_meal=='$' ?'selected':'' }}>$</option>
                         <option value="$$" {{ $vendor->avg_cost_meal=='$$' ?'selected':'' }}>$$</option>
                         <option value="$$$" {{ $vendor->avg_cost_meal=='$$$' ?'selected':'' }}>$$$</option>
                       </select>
                      </div>
                       {{--  <div class="form-group">
                      <label for="exampleInputName1">Comission Per Order</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="comission" value="{{$vendor->comission}}" placeholder="Enter Comission in Percentage">
                    </div> --}}
                    <div class="form-group">
                      <label for="exampleInputName1">Delivery Range</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="range" value="{{$vendor->delivery_range}}" placeholder="How many KM you Delivered">
                    </div>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Password</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="password1" placeholder="Enter password">
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputName1">Confirm Password</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="password2" placeholder="confirm password">
                    </div>
                    
                    
                    
                    
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <!--
                    <button class="btn btn-light">Cancel</button>
                    -->
                     <a href="{{route('cityadmin')}}" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
             <div class="col-md-2">
		  </div>
     
          </div>
        </div>
       </div>  
       <!-- Modal -->
<div class="modal fade" id="vendorImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Upload & Crop Image</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-8 text-center">
          <div id="vendor_image_demo" style="width:550px; margin-top:30px"></div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary crop_vendor_image">Crop</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="mainImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Upload & Crop Image</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-12 text-center">
          <div id="main_image_demo" style="width:900px; margin-top:30px"></div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary crop_main_image">Crop</button>
    </div>
  </div>
</div>
</div>   
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script  src="https://maps.googleapis.com/maps/api/js?key={{$map}}&callback=initMap&libraries=places&v=weekly"
  async >
  </script>
<script src="{{ url('assets/plugins/croppie/croppie.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    var rawImg1;
    $image_crop = $('#vendor_image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 300,
        height: 300,
        type: 'square' //circle
      },
      boundary: {
        width: 500,
        height: 500
      }
    });
    $('#vendorImageModal').on('shown.bs.modal', function () {
      console.log(rawImg1);
      $image_crop.croppie('bind', {
        url: rawImg1
      }).then(function () {
        console.log('jQuery bind complete');
      });
    });
    $('#vendor_img').on('change', function () {
      
      var reader = new FileReader();
      reader.onload = function (event) {
        rawImg1=event.target.result;
        /* $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function () {
          console.log('jQuery bind complete');
        }); */
        $('#vendorImageModal').modal('show');
      }
      reader.readAsDataURL(this.files[0]);

    });

    $('.crop_vendor_image').click(function (event) {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (response) {
        $('#vendorImageModal').modal('hide');
        $('#vendor_image').val(response);
        $('#uploaded_vendor_image').html("<img class='img-thumbnail' src=" + response + "></img>");

      })
    });
    // 2
    var rawImg;
    $main_image_crop = $('#main_image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 550,
        height: 230,
        type: 'square', //circle
      },
      boundary: {
        width: 700,
        height: 700,
      },
    });
    $('#mainImageModal').on('shown.bs.modal', function () {
      //alert('Shown pop');
      console.log(rawImg);
      $main_image_crop.croppie('bind', {
        url: rawImg
      }).then(function () {
        console.log('jQuery bind complete');
      });
    });
    $('#main_img').on('change', function () {
      // readFile(this); 

      var reader = new FileReader();
      reader.onload = function (event) {
        rawImg = event.target.result;

        $('#mainImageModal').modal('show');
      }
      reader.readAsDataURL(this.files[0]);

    });
    $('.crop_main_image').click(function (event) {
      $main_image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (response) {
        $('#mainImageModal').modal('hide');
        $('#main_image').val(response);
        $('#uploaded_main_image').html("<img class='img-thumbnail' src=" + response + "></img>");

      })
    });
    $(".des_price").hide();
    $('.dropify').dropify();
    $(".img").on('change', function () {
      $(".des_price").show();

    });
  });
</script>


<script>

  var map;
  var infoWindow;
  var lat="{{  $vendor->lat  }}";
  var lng="{{  $vendor->lng  }}";
  var myLatlng = {
    lat: parseFloat(lat),
    lng: parseFloat(lng),
  };
  
  var marker;
  
  function initMap() {
    map = new google.maps.Map(document.getElementById('maps'), {
      zoom: 16,
      center: myLatlng,
      mapTypeId: 'terrain'
    });
    placeMarker(myLatlng);
   // Create the search box and link it to the UI element.
   const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });
 
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
 
   
    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();
    var i=0;
    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }
      placeMarker(place.geometry.location);
      getAddress(place.geometry.location);
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
    // get place name on click 
   
    /* navigator.geolocation.getCurrentPosition(function (position) {
      var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      var myLatlng1 = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      map.setCenter(myLatlng);
    }); */
   
    google.maps.event.addListener(map, 'click', function (event) {
      placeMarker(event.latLng);
      getAddress(event.latLng);
    });
 //end

  }
 function getAddress(latLng){
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({
        'latLng': latLng
      }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            document.getElementById('vendor_address').value = results[0].formatted_address;
           // alert(results[0].formatted_address);
          }
        }
      });
 }

  function placeMarker(location) {
    if (marker) {
      marker.setPosition(location);
    } else {
      marker = new google.maps.Marker({
        position: location,
        map: map
      });
    }
    console.log("lat :"+marker.position.lat());
      console.log("lng :"+marker.position.lng());
      $('#lat').val(marker.position.lat());
      $('#lng').val(marker.position.lng());
  }
  $(document).ready(function () {
    $('#partner_form').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    return false;  
  }
}); 
  });
</script>
@endpush