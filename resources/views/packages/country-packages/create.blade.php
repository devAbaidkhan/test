@extends('cityadmin.layout.app')
@push('css')
  <style>

    .container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }

    /* The container */
    .container-checkbox {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container-checkbox input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark-checkbox {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container-checkbox:hover input ~ .checkmark-checkbox {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container-checkbox input:checked ~ .checkmark-checkbox {
      background-color: #2196F3;
    }

    /* Create the checkmark-checkbox/indicator (hidden when not checked) */
    .checkmark-checkbox:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark-checkbox when checked */
    .container-checkbox input:checked ~ .checkmark-checkbox:after {
      display: block;
    }

    /* Style the checkmark-checkbox/indicator */
    .container-checkbox .checkmark-checkbox:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
  </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
  integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.1/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endpush
@section ('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add New Package</h4>
          @if (count($errors) > 0)
          @if($errors->any())
          <div class="alert alert-primary" role="alert">
            {{$errors->first()}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">??</span>
            </button>
          </div>
          @endif
          @endif
          <form class="forms-sample" action="{{url('/franchise-admin/packages')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cityadmin_name">Package Name</label>
                  <input required  type="text" class="form-control" id="name" name="name"
                         placeholder="Enter Package Name">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="type">Package Type</label>
                  <select required class="form-control select2" id="type" name="type">
                    <option selected disabled>-Select One-</option>
                    <option value="subscription">Subscription</option>
                    <option value="commission">Commission</option>
                    <option value="commission_subscription">Commission + Subscription</option>
                  </select>
                </div>
            </div>
            </div>

              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="order_quantity">Orders Quantity</label>
                  <input type="number" required min="0" class="form-control" id="order_quantity" name="order_quantity"
                         placeholder="Enter Order Quantity">
                </div>
              </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" disabled required min="0" class="form-control" id="price" name="price"
                           placeholder="Enter Price">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="price">Commission %</label>
                    <input type="number" disabled required min="0" class="form-control" id="commission" name="commission"
                           placeholder="Enter %">
                  </div>
                </div>

{{--                <div class="col-md-6">--}}
{{--                <div class="form-group">--}}
{{--                  <label for="days">Days Limit</label>--}}
{{--                  <input type="number" required  min="0" class="form-control" id="days" name="days"--}}
{{--                         placeholder="Enter Days">--}}
{{--                </div>--}}
{{--              </div>--}}
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="">Services</label>
                <label class="container-checkbox">Delivery
                  <input name="delivery" type="checkbox">
                  <span class="checkmark-checkbox"></span>
                </label>
                <label class="container-checkbox">Dine In
                  <input name="dinein" type="checkbox" >
                  <span class="checkmark-checkbox"></span>
                </label>
                <label class="container-checkbox">Take Away
                  <input name="take_away" type="checkbox">
                  <span class="checkmark-checkbox"></span>
                </label>
              </div>
              <div class="col-md-4">
                <label for="">Subscription Type</label>
                <label class="container">Days
                  <input type="radio" class="subscription_type" required value="days"  name="subscription_type">
                  <span class="checkmark"></span>
                </label>
{{--                <label class="container">Monthly--}}
{{--                  <input type="radio" class="subscription_type" disabled value="monthly" name="subscription_type">--}}
{{--                  <span class="checkmark"></span>--}}
{{--                </label>--}}
{{--                <label class="container">Unlimited--}}
{{--                  <input type="radio" class="subscription_type" disabled value="unlimited" name="subscription_type">--}}
{{--                  <span class="checkmark"></span>--}}
{{--                </label>--}}
              </div>

              <div class="col-md-4 days-div">
                <label for="days">Package Days</label>
                <input type="number" required min="0" class="form-control" id="days" name="days"
                       placeholder="Enter Days">
              </div>

            </div>
            <div class="row" style="">
              <div class="col-md-1">
                <a href="{{url('franchise-admin/packages')}}" class="btn pull-left btn-light">Back</a>
                {{--                <input type="hidden" name="dialling_code" id="dialling_code" value="{{ Session::get("franchise_admin")->dialling_code }}">--}}
                {{--                <input type="hidden" name="cca3" id="cca3" value="{{ Session::get("franchise_admin")->cca3 }}">--}}
                {{--                <input type="hidden" name="timezone" id="timezone" value="{{ Session::get("franchise_admin")->timezone }}">--}}

              </div>
              <div class="col-md-11 text-right" >
                <button type="submit" class="btn btn-success pull-right submit mr-2">Submit</button>
              </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
  integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.1/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $('.select2').select2();
    $('.days-div').hide();

    $('form').on('submit',function (){

      $('.submit').prop('disabled',true)

      $('input[type=checkbox]').each(function (){

        if( $(this).prop('checked') === true){
          $(this).val(1)
        }else {
          $(this).prop('checked',true);
          $(this).val(0)
        }
      });
    });

    $('.subscription_type').on('click',function (){

      let value = $(this).val();
      if(value === 'days'){
        $('.days-div').show();
        $('#days').prop('required',true);
      }else {
        $('.days-div').hide();
        $('#days').prop('required',false);
      }

    });

    $('#type').on('change',function (){
      let type = $(this).val()
      console.log(type)
      if(type === 'subscription'){
        $('#price').prop('disabled',false)
        $('#commission').prop('disabled',true)
        $('#commission').val('')
      }else if(type === 'commission'){
        $('#price').prop('disabled',true)
        $('#price').val('')
        $('#commission').prop('disabled',false)
      }else if(type === 'commission_subscription'){
        $('#price').prop('disabled',false)
        $('#commission').prop('disabled',false)

      }else{
        $('#price').prop('disabled',true)
        $('#commission').prop('disabled',true)
      }

    });
  })
</script>
@endpush