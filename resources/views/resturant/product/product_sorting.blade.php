@extends('resturant.layout.app')


@section ('content')

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Products</h6>
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
      {{--  <form action="{{ route('searchproduct') }}" method="post">
      {{csrf_field()}}
      <input type="text" value="" name="productname" class="form-control" placeholder="Enter Product Name"
        style="width: 20%; display: inline;">
      <button type="submit" class="btn btn-success btn-md" value="Search" style="margin-top: -5px;"><i
          class="fa fa-search"></i></button>
      </form> --}}
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('resturantproductsortinglistcategorysearch') }}" id="resturantproductcategorysearch"
            method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label for="product_category">choose a category</label>
              <select class="form-control col-md-6" id="product_category" name="product_category" required>
                <option value="" selected disabled>Select Category</option>
                @foreach($subcat as $subcat)
                <option value="{{$subcat->resturant_cat_id}}"
                  {{ isset($product_category) &&  $product_category==$subcat->resturant_cat_id ? 'selected':'' }}><span
                    style="font-weight:bold">{{$subcat->cat_name}}</span></option>
                @endforeach
              </select>
            </div>
          </form>
          <button class="btn btn-primary float-right" type="submit" id="sorting_btn">Save Order</button>
        </div>


      </div>
      <div>
        <form action="{{ route('resturantproductsortingsave') }}" method="POST" id="sorting_form">
          {{csrf_field()}}
          <ul id="sortable" class="list-group">
            @forelse($product as $products)
            <li class="list-group-item">
              <span class="mr-3">{{$products->product_id}}</span>
              <span class="">{{$products->product_name}}</span>
              <img class="img-thumbnail float-right" src="{{url($products->product_image)}}" style="width: 30px;"
                alt="">
              <input type="hidden" name="product_id[]" value="{{ $products->product_id }}">
            </li>
            @empty
            @endforelse
          </ul>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>

@endsection
@push('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  var fixHelperModified = function (e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();
      $helper.children().each(function (index) {
        $(this).width($originals.eq(index).width())
      });
      return $helper;
    },
    updateIndex = function (e, ui) {
      var arr = [];
      $('.sort', ui.item.parent()).each(function (i) {
        arr.push(i + 1);
      });
    };

  $(document).ready(function () {
    $("#sortable").sortable({
      helper: fixHelperModified,
      stop: updateIndex
    }).disableSelection();


    $('#product_category').on('change', function () {
      $('#resturantproductcategorysearch').submit();
    });

    $('#sorting_btn').on('click', function () {
      $('#sorting_form').submit();
    });
  });
</script>
@endpush