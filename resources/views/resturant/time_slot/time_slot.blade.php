@extends('resturant.layout.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
  integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
  crossorigin="anonymous" />
  <style>
   
/* Selected option */

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
          <h4 class="card-title">Delivery Settings</h4>
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
          <form class="forms-sample" action="{{route('resturanttimeslotupdate')}}" method="post"
            enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" class="form-control" name="time_slot_id" value="{{$city->time_slot_id}}">

            <div class="form-group">
              <label for="exampleInputName1">delivery charges</label>
              <input type="text" class="form-control" name="delivery_charges" value="{{$vendor->delivery_charges}}">
            </div>
            <div class="form-group">
              <label for="exampleInputName1">delivery range (in kilometer)</label>
              <input type="text" class="form-control" name="delivery_range" value="{{$vendor->delivery_range}}">
            </div>
            <div class="form-group">
              <label for="estimated_delivery_time">Estimated Delivery Time (in minutes)</label>
              <input type="text" class="form-control" name="estimated_delivery_time" value="{{$vendor->estimated_delivery_time}}" placeholder="e.g;30 Mintues">
            </div>
            <div class="form-group">
              <label for="exampleInputName1">keywords</label>
              <!--<input type="text" class="form-control" name="res_keywords" value="{{$vendor->keywords}}">-->
              <select name="res_keywords[]" value="{{$vendor->keywords}}" multiple class="form-control tags" >
                @forelse ($keywords as $keyword)
                <option value="{{ $keyword }}" selected>{{ $keyword }}</option>
                @empty
                @endforelse
              </select>
            </div>
            <div class="form-group">
              <label for="avg_cost_meal">Average Cost Meal per Person</label>
             <select name="avg_cost_meal" id="avg_cost_meal" class="form-control" required>
               <option selected disabled>Select options</option>
               <option value="$" {{ $vendor->avg_cost_meal=='$' ?'selected':'' }}>$</option>
               <option value="$$" {{ $vendor->avg_cost_meal=='$$' ?'selected':'' }}>$$</option>
               <option value="$$$" {{ $vendor->avg_cost_meal=='$$$' ?'selected':'' }}>$$$</option>
             </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName1">open Time</label>
              <input type="time" class="form-control" name="open_hour" value="{{$city->open_hour}}">
            </div>

            <div class="form-group">
              <label for="exampleInputName1">close Time</label>
              <input type="time" class="form-control" name="close_hour" value="{{$city->close_hour}}">

            </div>

            <div class="form-group">
              <label>Intervals</label>
              <input type="text" class="form-control" name="time_slot" value="{{$city->time_slot}}">
            </div>


            <button type="submit" class="btn btn-success mr-2">Submit</button>
            <!--
                    <button class="btn btn-light">Cancel</button>
                    -->

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
  integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('.tags').select2({
      tags: true,
      tokenSeparators: [','],
      placeholder: "Add your tags here",
      /* the next 2 lines make sure the user can click away after typing and not lose the new tag */
      selectOnClose: true,
      closeOnSelect: true,
      templateSelection: function (data, container) {
        /* $(container).css("background-color", 'DarkSlateGrey'); */
        return data.text;
      },
    });
    $(".des_price").hide();

    $(".img").on('change', function () {
      $(".des_price").show();

    });
  });
</script>
@endpush