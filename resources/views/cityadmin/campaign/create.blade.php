@extends('cityadmin.layout.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
  integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
  crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ url('assets/plugins/croppie/croppie.css') }}" />
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
          <h4 class="card-title">Add Campaign</h4>
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
          <form class="forms-sample" action="{{route('campaign.store')}}" method="post"
            enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="campaign_type_id">Campaign Title</label>
              <input type="hidden" name="title" id="title">
              <select class="form-control select2" id="campaign_type_id" name="campaign_type_id" required>
                <option selected disabled>Select Title</option>
                @foreach($campaign_types as $campaign_type)
                <option value="{{$campaign_type->id}}"> {{$campaign_type->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
              <label>Campaign Banner</label>
              <div class="input-group col-xs-12">
                <input type="file" name="banner" class="file-upload-default" id="banner" required>
                <input type="hidden" name="banner_image" id="banner_image">
              </div>
              <div id="uploaded_banner_image">
              </div>
              <small class="text-danger">Image must have 270*290 px demensions</small>
            </div>
            <div class="form-group">
              <label for="campaign_city">Select Compaign City</label>
              <select class="form-control select2" id="campaign_city" name="campaign_city[]" required multiple placeholder="Select Cities">
                @foreach($cities as $city)
                <option value="{{$city->city}}"> {{$city->city}}</option>
                @endforeach
              </select>
            </div>

            <button type="submit" class="btn btn-success mr-2">Submit</button>
            <a href="{{route('campaign.index')}}" class="btn btn-danger">Cancel</a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-2">
    </div>

  </div>
</div>
</div>

<!--Crop Modal -->
<div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
  integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
  crossorigin="anonymous"></script>


  <script src="{{ url('assets/plugins/croppie/croppie.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.select2').select2();
    $('#campaign_type_id').on('change', function () {
      var title=$("#campaign_type_id :selected").text();
      $('#title').val(title);
    });

    // Crop start
    var rawImg1;
    $image_crop = $('#vendor_image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 270,
        height: 290,
        type: 'square' //circle
      },
      boundary: {
        width: 600,
        height: 600
      }
    });
    $('#cropModal').on('shown.bs.modal', function () {
      console.log(rawImg1);
      $image_crop.croppie('bind', {
        url: rawImg1
      }).then(function () {
        console.log('jQuery bind complete');
      });
    });
    $('#banner').on('change', function () {

      var reader = new FileReader();
      reader.onload = function (event) {
        rawImg1 = event.target.result;
        /* $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function () {
          console.log('jQuery bind complete');
        }); */

      }
      $('#cropModal').modal('show');
      reader.readAsDataURL(this.files[0]);

    });

    $('.crop_vendor_image').click(function (event) {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (response) {
        $('#cropModal').modal('hide');
        $('#banner_image').val(response);
        $('#uploaded_banner_image').html("<img class='img-thumbnail' src=" + response + "></img>");

      })
    });
  })
</script>
@endpush