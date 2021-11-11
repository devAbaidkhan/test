@extends('admin.layout.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
  integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.1/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endpush
@section ('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-1">
    </div>

    <div class="col-md-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Franchise</h4>
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
          <form class="forms-sample" action="{{route('AddNewcityadmin')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
              <label for="cityadmin_name">Franchise Name</label>
              <input type="text" class="form-control" id="cityadmin_name" name="cityadmin_name"
                placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="role_id">Role</label>

              <select class="form-control select2" id="role_id" name="role_id" required>
                <option disabled selected>Select Role</option>
                @forelse ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @empty

                @endforelse
              </select>
            </div>
            <div class="form-group">
              <label for="country">Countries</label>

              <select class="form-control select2" id="country" name="country" required>
                <option disabled selected>Select Country</option>
                @foreach($countries as $country)
                @if (!empty($country['admin']))
                <option value="{{$country['admin']}}" data-cca3="{{ $country['cca3'] }}" data-cca2="{{ $country['cca2'] }}"> {{$country['admin']}}</option>
                @endif

                @endforeach
              </select>
            </div>
            <div class="form-group" id="city_div">
              <label for="city_name">City</label>
              <select class="form-control" id="city_name" name="city_name" style="width: 100%"> 
                <option selected disabled>Select City</option>
              </select>
            </div>
            <div class="form-group">
              <label for="currency">Currencies</label>
              <select class="form-control" id="currency" name="currency" required>
                <option selected disabled>Select Currency</option>
              </select>
            </div>
            <div class="form-group">
              <label for="cityadmin_address">Address</label>
              <input type="text" class="form-control" id="cityadmin_address" name="cityadmin_address"
                placeholder="Enter Address">
            </div>
            <div class="form-group">
              <input type="hidden" name="lat" id="lat">
              <input type="hidden" name="lng" id="lng">
            </div>

            <div class="form-group">
              <label>Image</label>
              <div class="input-group col-xs-12">
                <input type="file" name="cityadmin_image" class="file-upload-default dropify"  data-max-width="257"  data-max-height="257" data-allowed-file-extensions="jpg png ico jpeg">
              </div>
              <small class="text-danger">Image must have 256*256 demensions</small>
            </div>

            <div class="form-group">
              <label for="cityadmin_email">Email</label>
              <input type="text" class="form-control" id="cityadmin_email" name="cityadmin_email"
                placeholder="Enter Email">
            </div>
            <label for="cityadmin_phone">Phone</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="cityadmin_phone_prefix"></span>
              </div>
              <input type="text" class="form-control" id="cityadmin_phone" name="cityadmin_phone"
                placeholder="Enter  Phone" aria-describedby="basic-addon1">
            </div>
            {{-- <div class="input-group mb-3">
              
              <input type="text" class="form-control" placeholder="Username" aria-label="Username" >
            </div> --}}
            <div class="form-group">
              <label for="password1">Password</label>
              <input type="text" class="form-control" id="password1" name="password1"
                placeholder="Enter password">
            </div>

            <div class="form-group">
              <label for="password2">Confirm Password</label>
              <input type="text" class="form-control" id="password2" name="password2"
                placeholder="confirm password">
            </div>
            <input type="hidden" name="dialling_code" id="dialling_code">
            <input type="hidden" name="cca3" id="cca3">
            <input type="hidden" name="cca2" id="cca2">
            <input type="hidden" name="timezone" id="timezone">
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


@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
  integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.1/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $('.select2').select2();
    $('.dropify').dropify();
    $('#country').on('change', function () {
      var cca3 = $(this).children('option:selected').data('cca3');
      var cca2 = $(this).children('option:selected').data('cca2');
      // console.log(cca3);
      $('#cca3').val(cca3);
      $('#cca2').val(cca2);
      $("#city_name").empty();
      $('#city_name').append($('<option>', {
        value: '',
        text: 'Select City',
        selected: true,
        disabled: true
      }));
      $.ajax({
        type: "post",
        url: "{{ route('country.city') }}",
        data: {
          _token: "{{csrf_token()}}",
          cca3: cca3,
          cca2: cca2,
        },
        success: function (data) {
           //  console.log(data);
          $.each(data.cities, function (index, value) {
        //    console.log(value.un_lat + " : " + value.un_long);
            if (value.name != '' && value.name!=undefined) {
              $('#city_name').append($('<option>', {
                value: value.name,
                text: value.name,
                "data-lat": value.un_lat,
                "data-lng": value.un_long,
                "data-timezone": value.timezone,

              }));
            }
          });
          //console.log(data.dialling_code);
          
          $('#dialling_code').val(data.dialling_code);
          $('#cityadmin_phone_prefix').text(data.dialling_code);
          $('#city_name').select2();
        }
      });
      $("#currency").empty();
      $('#currency').append($('<option>', {
        value: '',
        text: 'Select Currency',
        selected: true,
        disabled: true
      }));
      $.ajax({
        type: "post",
        url: "{{ route('country.currency') }}",
        data: {
          _token: "{{csrf_token()}}",
          cca3: cca3,
          cca2: cca2,
        },
        success: function (data) {
          // console.log(data);
          $.each(data, function (index, value) {
            // console.log(index);
            $('#currency').append($('<option>', {
              value: index,
              text: index
            }));
          });
          $('#currency').select2();
        }
      });
    });
    $('#city_name').on('change', function () {
      var lat = $(this).children('option:selected').data('lat');
      var lng = $(this).children('option:selected').data('lng');
      var timezone = $(this).children('option:selected').data('timezone');
      $('#lat').val(lat);
      $('#lng').val(lng);
      $('#timezone').val(timezone);
    });
    $('#role_id').on('change', function () {

      var id = $(this).children("option:selected").text();

      if (id == 'CountryFranchise') {
        $('#city_div').attr('hidden', true);
        $('#city_name').attr('required', false);
      } else {
        $('#city_div').attr('hidden', false);
        $('#city_name').attr('required', true);
      }
    });
  })
</script>
@endpush