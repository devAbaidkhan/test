@extends('resturant.layout.app')
@push('css')
<style>
  sup {
    color: red;
    position: initial;
    font-size: 111%;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.4/sweetalert2.min.css"
  integrity="sha512-1ZnBKRTKQpSWa+zTPLIvikrThliiXRIUAk7vYALF8lpHpkUI8y9kynkCtmjpxGRiF4Gic9cXcbHrcAP3CPif4Q=="
  crossorigin="anonymous" />
@endpush

@section ('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Addon
            <input type="checkbox" id="checkAl">
          </h4>
        </div>
        <div class="card-body">

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
          <form class="forms-sample" action="{{route('resturantAddNewproductaddon')}}" method="post"
            enctype="multipart/form-data" id="add_form">
            {{csrf_field()}}

            <input type="hidden" name="id" value="{{$product->product_id}}">

            <div class="row">
              @forelse ($restaurant_addons as $restaurant_addon)
              <div class="col-md-3 p-2">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="addon_id[]"
                      value="{{ $restaurant_addon->addon_id }}">
                    {{ $restaurant_addon->addon_name }}
                  </label>
                </div>
              </div>
              @empty
              @endforelse
            </div>

            <div class="form-group  mt-3">
              @if(permission('create-addons-product'))
              <button type="submit" class="btn btn-success mr-2" id="save_btn">Submit</button>
              @endif
              <a href="{{route('resturantaddon',$product->product_id)}}" class="btn btn-light" id="cancel">Cancel</a>
            </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.4/sweetalert2.min.js"
  integrity="sha512-CIz2tDz3t76s1DE7eYvLrS6INwR6VlKsWHMrBtswdL1TiokTomhuUIiOgIN0U+l1BaThZUYDMrSRiRtjg8nGOQ=="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $("#checkAl").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $('#save_btn').on('click', function (e) {
      e.preventDefault();

      Swal.fire({
        title: 'Are you sure?',
        text: "You want to save this addons!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#add_form').submit();
        }
      })
      return false;
    });


    $('#cancel').on('click', function (e) {
      e.preventDefault();
      var url = $(this).attr('href');
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to leave!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, leave!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      })
    });
  });
</script>
@endpush