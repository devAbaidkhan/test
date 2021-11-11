@extends('resturant.layout.app')
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/croppie/croppie.css') }}" />
<style>
  sup {
    color: red;
    position: initial;
    font-size: 111%;
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
          <h4 class="card-title">Add product</h4>
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
          <form class="forms-sample" action="{{route('resturantaddnewproduct')}}" method="post"
            enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="exampleFormControlSelect3">choose a category<sup>*</sup></label>
              <select class="form-control form-control-sm" id="exampleFormControlSelect3 " name="subcat_name" required>
                <option value="" selected disabled>Select Category</option>
                @foreach($subcat as $subcat)
                <option value="{{$subcat->resturant_cat_id}}"><span
                    style="font-weight:bold">{{$subcat->cat_name}}</span></option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="product_name">Product Name<sup>*</sup></label>
              <input type="text" class="form-control" id="product_name" name="product_name"
                placeholder="Enter product name">
            </div>
            <div class="form-group">
              <label>Product Image <sup>*</sup></label>

              <div class="input-group col-xs-12">
                <input type="file" name="product_img" id="product_img" class="file-upload-default">
                <input type="hidden" name="product_image" id="product_image">
              </div>
              <div id="uploaded_product_image">
              </div>
            </div>


            <div class="form-group">
              <label for="mrp">Retail Price without GST <sup>*</sup></label>
              <input type="number" class="form-control" id="mrp" name="mrp" placeholder="Enter Retail Price" step="any">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="price">DEDO Discount Price without GST <sup>*</sup></label>
                  <input type="number" class="form-control" id="price" name="price" placeholder="Enter Discount"
                    step="any">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="price">DEDO Discount Percentage %<sup>*</sup></label>
                  <input type="number" class="form-control" id="discount_price_percentage"
                    name="discount_price_percentage" placeholder="Enter Discount %" step="any">
                  <small class="text-danger" id="discount_price_percentage_error" style="display: none">Discount Price
                    Must be Less than Retail Price</small>
                </div>
              </div>
            </div>



            <div class="form-group">
              <label for="unit">Unit <sup>*</sup></label>
              <input type="text" class="form-control" id="unit" name="unit" placeholder="Quator/half/full...">
            </div>
            <div class="form-group">
              <label for="serving">Serving</label>
              <input type="text" class="form-control" id="serving" name="serving" >
            </div>
            <div class="form-group">
              <label for="unit">Order  No<sup>*</sup></label>
              <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Enter Order" min="0" max="1000">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect3">Choose Status<sup>*</sup></label>
              <select class="form-control form-control-sm" id="product_status" name="product_status" required>
                <option value="" selected disabled>Select Option</option>
                @foreach($resturant_product_status as $product_status)
                <option value="{{$product_status->id}}"><span
                    style="font-weight:bold">{{$product_status->name}}</span></option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="product_description">product Description <sup>*</sup></label>
              <input type="text" class="form-control" id="product_description" name="product_description"
                placeholder="Enter description">
            </div>
            @if (permission('create-product'))
            <button type="submit" class="btn btn-success mr-2" id="submit_btn">Submit</button>
            @endif
            <!--
                    <button class="btn btn-light">Cancel</button>
                    -->
            <a href="{{route('resturantproduct')}}" class="btn btn-light">Cancel</a>
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
@endsection

@push('js')

<script src="{{ url('assets/plugins/croppie/croppie.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#mrp').on('change', function () {
      cal_price();
    });
    $('#price').on('change', function () {
      cal_price();
    });
    $('#discount_price_percentage').on('change', function () {
      cal_price_ptr();
    });


    var rawImg1;
    $image_crop = $('#vendor_image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 250,
        height: 250,
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
    $('#product_img').on('change', function () {

      var reader = new FileReader();
      reader.onload = function (event) {
        rawImg1 = event.target.result;
        /* $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function () {
          console.log('jQuery bind complete');
        }); */

      }
      $('#vendorImageModal').modal('show');
      reader.readAsDataURL(this.files[0]);

    });

    $('.crop_vendor_image').click(function (event) {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (response) {
        $('#vendorImageModal').modal('hide');
        $('#product_image').val(response);
        $('#uploaded_product_image').html("<img class='img-thumbnail' src=" + response + "></img>");

      })
    });
  });

  function cal_price() {
    var mrp = $('#mrp').val() || 0; /* retail price */
    var price = $('#price').val() || 0; /* discount price */
    mrp = parseFloat(mrp);
    price = parseFloat(price);
    if (mrp <= 0 || price <= 0) {
      console.log('a');
      return false;
    }
    if (mrp >= price) {
      var discount = mrp - price;
      var discount_price_percentage = ((discount / mrp) * 100);
      $('#discount_price_percentage').val(discount_price_percentage.toFixed(2));
      $('#discount_price_percentage_error').hide();
      $('#submit_btn').attr('disabled', false);
    } else {
      $('#mrp').val('');
      $('#price').val('');
      $('#discount_price_percentage').val('');
      $('#discount_price_percentage_error').show();
      $('#submit_btn').attr('disabled', true);
    }
  }

  function cal_price_ptr() {
    var mrp = $('#mrp').val() || 0; /* retail price */
    var discount_price_percentage = $('#discount_price_percentage').val() || 0; /* discount price */
    
    mrp = parseFloat(mrp);
    discount_price_percentage = parseFloat(discount_price_percentage);
    if (mrp <= 0 || discount_price_percentage <= 0 || discount_price_percentage>100) {
      return false;
    }
    
      var discount = (discount_price_percentage * mrp) / 100;
      discount = mrp - discount;
      console.log(discount);
      $('#price').val(discount.toFixed(2));
      $('#discount_price_percentage_error').hide();
      $('#submit_btn').attr('disabled', false);
    
  }
  
</script>
@endpush