@extends('resturant.layout.app')

@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
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
      <a class="btn btn-info ml-2" style="float: right;" href="{{route('product.category.sortinglist')}}">Set Sorting Order
        </a>
      @if (permission('create-categories'))
      <a class="btn btn-success m-auto" style="float: right;" href="{{route('resturantAddCategory')}}">Add</a>
      @endif

    </div>
    <div class="card-body">
      @if ('view-categories-list')
      <div class="table-responsive">
        <table class="table table-bordered" id="example6" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Category Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.No</th>
              <th>Category Name</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @if(count($vendorCategory)>0)
            @php $i=1; @endphp
            @foreach($vendorCategory as $adminCategories)
            <tr>
              <td>{{$i}}</td>
              <td>{{$adminCategories->cat_name}}</td>

              <td>
                @if (permission('update-categories'))
                <a href="{{route('resturantEditCategory', [$adminCategories->resturant_cat_id])}}"
                  class="btn btn-primary">Edit</a>
                @endif
                @if (permission('delete-categories'))
                <a href="{{route('resturantDeleteCategory', [$adminCategories->resturant_cat_id])}}"
                  class="btn btn-danger">Delete</a>
                @endif
              </td>
            </tr>
            @php $i++; @endphp
            @endforeach
            @else
            <tr>
              <td>No data found</td>
            </tr>
            @endif

          </tbody>
        </table>
        {!! $vendorCategory->links("pagination::bootstrap-4") !!}
      </div>
      @endif
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>


@endsection