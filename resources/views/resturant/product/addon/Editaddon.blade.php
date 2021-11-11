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
          <form class="forms-sample" action="{{route('resturantUpdateproductaddon', $restaurant_product_addon->id)}}" method="post"
            enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $restaurant_product_addon->id }}">
            <input type="hidden" name="product_id" value="{{ $restaurant_product_addon->product_id }}">
            
            <div class="row">
              @forelse ($restaurant_addons as $restaurant_addon)
              <div class="col-md-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="addon_id"
                      value="{{ $restaurant_addon->addon_id }}" {{ $restaurant_addon->addon_id==$restaurant_product_addon->addon_id?'checked':'' }}>
                    {{ $restaurant_addon->addon_name }}
                  </label>
                </div>
              </div>
              @empty
              @endforelse
            </div>
            @if(permission('update-addons-product'))
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            @endif

            <a href="{{route('resturantaddon',$restaurant_product_addon->product_id)}}" class="btn btn-light">Cancel</a>
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