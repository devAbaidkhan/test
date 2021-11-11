@extends('resturant.layout.app')
@push('css')
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
@endpush
@section ('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update product</h4>
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
          <form class="forms-sample" action="{{route('resturantupdateproduct',$product->product_id)}}" method="post"
            enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="exampleFormControlSelect3">choose a Category</label>
              <select class="form-control form-control-sm" id="exampleFormControlSelect3 " name="subcat_name">
                @foreach($subcat as $subcat)
                <option value="{{$subcat->resturant_cat_id}}" @if($subcat->resturant_cat_id == $product->subcat_id)
                  selected @endif>
                  <span style="font-weight:bold">{{$subcat->cat_name}}</span>
                </option>
                @endforeach


              </select>
            </div>
            <div class="form-group">
              <label for="product_name">product Name</label>
              <input type="text" class="form-control" id="product_name" value="{{$product->product_name}}"
                name="product_name" placeholder="Enter product Name">
            </div>
            <div class="form-group">
              <label>product image</label>

              <input type="hidden" name="old_product_image" value="{{$product->product_image}}"
                class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="file" name="product_img" id="product_img" class="file-upload-default">
                <input type="hidden" name="product_image" id="product_image">
              </div>
              <div id="uploaded_product_image">
                <img class='img-thumbnail' src="{{ asset($product->product_image) }}"></img>
              </div>
            </div>
            <div class="form-group">
              <label for="unit">Order  No<sup>*</sup></label>
              <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Enter Order" min="0" max="1000" value="{{ $product->order_no }}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect3">Choose Status<sup>*</sup></label>
              <select class="form-control form-control-sm" id="product_status" name="product_status" required>
                <option value="" selected disabled>Select Option</option>
                @foreach($resturant_product_status as $product_status)
                <option value="{{$product_status->id}}" {{ $product->product_status==$product_status->id?'selected':'' }}><span
                    style="font-weight:bold">{{$product_status->name}}</span></option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="product_description">product Description</label>
              <input type="text" class="form-control" id="product_description" name="product_description"
                value="{{$product->description}}">
            </div>
            @if('update-product')
            <button type="submit" class="btn btn-success mr-2">Submit</button>
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

 
  
</script>
@endpush