@extends('resturant.layout.app')

@section ('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Delivery Boy</h4>
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
          <form class="forms-sample" action="{{route('resturantUpdatedelivery_boy',$delivery_boy->delivery_boy_id)}}"
            method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
              <label for="delivery_boy_name">delivery_boy Name</label>
              <input type="text" class="form-control" id="delivery_boy_name"
                value="{{$delivery_boy->delivery_boy_name}}" name="delivery_boy_name"
                placeholder="Enter delivery_boy Name" requirment>
            </div>
            <div class="form-group">
              <label>delivery_boy image</label>

              <input type="hidden" name="old_delivery_boy_image" value="{{$delivery_boy->delivery_boy_image}}"
                class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="file" name="delivery_boy_image" class="file-upload-default">
              </div>
            </div>
            <div class="form-group">
              <label for="delivery_boy_phone">Delivery Boy Phone</label>
              <input type="text" class="form-control" id="delivery_boy_phone" name="delivery_boy_phone"
                value="{{$delivery_boy->delivery_boy_phone}}" requirment>
            </div>



            <div class="form-group">
              <label for="password1">Password</label>
              <input type="text" class="form-control" id="password1" name="password1"
                placeholder="enter new password if you want to change the previous password" requirment>
            </div>

            <div class="form-group">
              <label for="password2">Confirm Password</label>
              <input type="text" class="form-control" id="password2" name="password2" placeholder="retype password"
                requirment>
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
  $(document).ready(function () {

    $(".des_price").hide();

    $(".img").on('change', function () {
      $(".des_price").show();

    });
  });
</script>
@endsection