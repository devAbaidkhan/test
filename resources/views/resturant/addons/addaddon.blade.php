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
          <h4 class="card-title">Add Addon</h4>
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
          <form class="forms-sample" action="{{route('restaurant_addons.store')}}" method="post"
            enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
              <label for="addon_name">Addon Name</label>
              <input type="text" class="form-control" id="addon_name" name="addon_name" placeholder="Enter Addon Name" required>
            </div>

            <div class="form-group">
              <label for="addon_price">Addon Price</label>
              <input type="text" class="form-control" id="addon_price" name="addon_price" placeholder="Enter price" required>
            </div>
            <div class="form-group">
              <label for="order_no">Order</label>
              <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Enter Order" min="0" max="1000" required>
            </div>
            @if(permission('create-addons-product'))
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            @endif
            <a href="{{route('restaurant_addons.index')}}" class="btn btn-light">Cancel</a>
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