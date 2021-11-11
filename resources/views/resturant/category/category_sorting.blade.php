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
            <a href="{{ route('resturantcategory') }}" class="btn btn-danger float-left mb-3">Back</a>
            <button class="btn btn-primary float-right mb-3" type="submit" id="sorting_btn">Save Order</button>
          </div>
        
      </div>
      <div>
        <form action="{{ route('product.category.sortingsave') }}" method="POST" id="sorting_form">
          {{csrf_field()}}
          <ul id="sortable" class="list-group">
            @forelse($vendorCategory as $adminCategories)
            <li class="list-group-item">
            {{$adminCategories->cat_name}}
              <input type="hidden" name="resturant_cat_id[]" value="{{ $adminCategories->resturant_cat_id }}">
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



    $('#sorting_btn').on('click', function () {
      $('#sorting_form').submit();
    });
  });
</script>
@endpush