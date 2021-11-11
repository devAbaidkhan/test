@extends('resturant.layout.app')
@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.0/css/dropify.min.css"
  integrity="sha512-1le5umV712TnW47Lwf6Ug6kkZk1g6rPGOREBLKG8SvrFCNuCYPlCwwxIXBmRsi0q2BTWvbOrHiHfz0LvkX+1VA=="
  crossorigin="anonymous" />

<style>
  .material-icons {
    margin-top: 0px !important;
    margin-bottom: 0px !important;
  }

  a:hover {
    cursor: pointer;
  }
 
  .form-group.required .control-label:after {
  content:"*";
  color:red;
}

</style>
@endpush
@section ('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12">
      @if (session()->has('success'))
      <div class="alert alert-success">
        @if(is_array(session()->get('success')))
        <ul>
          @foreach (session()->get('success') as $message)
          <li>{{ $message }}</li>
          @endforeach
        </ul>
        @else
        {{ session()->get('success') }}
        @endif
      </div>
      @endif
      @if (count($errors) > 0)
      @if($errors->any())
      <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      @endif
      @endif
    </div>

    <div class="col-lg-12">
      <form class="forms-sample" action="{{route('restaurantimport.save')}}" method="post"
        enctype="multipart/form-data">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Products Upload <button class="btn btn-primary float-right" type="submit">Submit</button></h4>
            
          </div>

          <div class="container"><br>

            {{csrf_field()}}

            @foreach ($products as $product)
            <div class="row border">
              {{-- <input type="hidden" name="subcat_id[]" value="{{ $product['cat_id'] }}"> --}}
              <div class="col-md-6">
                <div class="form-group required">
                  <label for="control-label">Product Category</label>
                  <select class="form-control" name="subcat_id[]" required>
                    <option disabled selected>select option</option>
                    @foreach ($subcat as $cat)
                        <option value="{{ $cat->resturant_cat_id }}">{{ $cat->cat_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="control-label">Product Name</label>
                  <input class="form-control" type="text" name="product_name[]" value="{{ $product['product_name'] }}" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="control-label">Description</label>
                  <input class="form-control" type="text" name="description[]" value="{{ $product['description']}}" required>
                </div>
              </div>
              {{-- <div class="col-md-4">
                <div class="form-group">
                  <label for="">Quantity</label>
                  <input class="form-control" type="number" name="quantity[]" value="{{ $product['quantity'] }}">
                </div>
              </div> --}}
              <div class="col-md-12">
                <div class="form-group">
                  <label for="required">Product image</label>
                  <input class="form-control dropify" type="file" name="product_image[]" data-max-file-size="1M"
                    data-max-width="513" data-max-height="513" data-allowed-file-extensions="png jpeg jpg" required>
                </div>
              </div>

              {{-- <div class="col-md-4">
                <div class="form-group">
                  <label for="">Unit</label>
                  <input class="form-control" type="text" name="unit[]" value="{{ $product['unit'] }}">
                </div>
              </div> --}}
              {{-- <div class="col-md-4">
                <div class="form-group">
                  <label for="">Price</label>
                  <input class="form-control" type="number" name="price[]" value="{{ $product['price'] }}">
                </div>
              </div> --}}
              {{-- <div class="col-md-4">
                <div class="form-group">
                  <label for="">Strick Price</label>
                  <input class="form-control" type="number" name="strick_price[]"
                    value="{{ $product['strick_price'] }}">
                </div>
              </div> --}}
              
            </div>
            <hr>

            @endforeach
            <div class="col-md-12">
              <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </div>

          </div>

        </div>
      </form>

    </div>
  </div>
</div>
<div>
</div>

</div>
@endsection



@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.0/js/dropify.min.js"
  integrity="sha512-5lwTm2lltwGLuFpI0jqcCxGS4Y7cJn3ylGb0BTJty5xGt2lqT9/efUhQV1dyOXpQ/PbvmE6EUP+zRIPGiccFng=="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $('.dropify').dropify();
  });
</script>
<script type="text/javascript">
  function showImage() {
    document.getElementById('loadingImage').style.display = "block";
  }
</script>
<script>
  function executeDownload(url) {
    window.location.href = url;
  }
</script>
<script type="text/javascript">
  function showImage2() {
    document.getElementById('loadingImage2').style.display = "block";
  }

  function onOpen() {
    SpreadsheetApp.getUi()
      .createMenu('csv')
      .addItem('export as csv files', 'dialog')
      .addToUi();
  }

  function dialog() {
    var html = HtmlService.createHtmlOutputFromFile('download');
    SpreadsheetApp.getUi().showModalDialog(html, 'CSV download dialog');
  }

  function saveAsCSV() {
    var filename = "product.csv"; // CSV file name
    var folder = ""; // Folder ID

    var csv = "";
    var v = SpreadsheetApp
      .getActiveSpreadsheet()
      .getActiveSheet()
      .getDataRange()
      .getValues();
    v.forEach(function (e) {
      csv += e.join(",") + "\n";
    });
    var url = DriveApp.getFolderById(folder)
      .createFile(filename, csv, MimeType.CSV)
      .getDownloadUrl()
      .replace("?e=download&gd=true", "");
    return url;
  }
</script>
@endpush