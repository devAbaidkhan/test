@extends('resturant.layout.app')
<style>
  sup {
    color: red;
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
          <h4 class="card-title">Update Varient</h4>
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
          <form class="forms-sample" action="{{route('resturantUpdateproductvariant', $variant_id)}}" method="post"
            enctype="multipart/form-data">
            {{csrf_field()}}


            <input type="hidden" name="variant_id" value="{{$variant_id}}">

            <div class="form-group">
              <label for="mrp">Retail Price without GST <sup>*</sup></label>
              <input type="text" class="form-control" id="mrp" name="mrp" placeholder="Enter MRP" value="{{ $product->price }}">
            </div>

            <div class="form-group">
              <label for="price">DEDO Discount Price without GST <sup>*</sup></label>
              <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ $product->strick_price }}">
            </div>
            <div class="form-group">
              <label for="price">DEDO Discount Percentage %<sup>*</sup></label>
              <input type="number" class="form-control" id="discount_price_percentage" name="discount_price_percentage"
                placeholder="Enter Discount %" step="any" value="{{ $product->discount_price_percentage }}">
              <small class="text-danger" id="discount_price_percentage_error" style="display: none">Discount Price
                Must be Less than Retail Price</small>
            </div>
            <div class="form-group">
              <label for="serving">Serving</label>
              <input type="text" class="form-control" id="serving" name="serving" value="{{ $product->serving }}">
            </div>

            <div class="form-group">
              <label for="unit">Unit</label>
              <input type="text" class="form-control" id="unit" name="unit" placeholder="quator/half/full" value="{{ $product->unit }}">
            </div>
            @if (permission('update-varients-product'))
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            @endif
            <a href="{{route('resturantvarient',$product->product_id)}}" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-2">
    </div>

  </div>
</div>
</div>

@endsection
@push('js')
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
    if (mrp <= 0 || discount_price_percentage <= 0 || discount_price_percentage > 100) {
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