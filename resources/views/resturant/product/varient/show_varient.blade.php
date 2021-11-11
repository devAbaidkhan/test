@extends('resturant.layout.app')

@section ('content')

<style>
  input[type="file"] {
    background-color: transparent;
    padding: 0px;
  }
</style>


<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Varients</h6>
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
      @if (permission('create-varients-product'))
      <a class="btn btn-success m-auto" style="float: right;" href="{{route('resturantAddproductvariant', $id)}}">Add
        Varient</a>
        @endif
    </div>
    <div class="card-body">
      @if (permission('view-varients-product-list'))
      <div class="table-responsive">
        <table class="table table-bordered" id="example8" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>product_id</th>
              <th>Retail Price</th>
              <th>Discount Price</th>
              <th>unit</th>

              <th>Action</th>
            </tr>
          </thead>

          <tbody>
          
            @php $i=1; @endphp
            @forelse($productvarient as $products)
            <tr>
              <td>{{$products->product_id}}</td>
              <td>{{$products->price}}</td>
              <td>{{$products->strick_price}}</td>
              <td>{{$products->unit}}</td>


              <td>
                @if (permission('update-varients-product'))
                <a href="{{route('resturantEditproductvariant',$products->variant_id)}}"
                  style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;padding-left: 9px;"
                  style="color: #fff;"><i class="fa fa-edit" style="width: 10px;"></i></a>
                  @endif
                  @if (permission('delete-varients-product'))
                <button type="button" style="width: 28px; padding-left: 6px;" class="btn btn-danger" data-toggle="modal"
                  data-target="#exampleModal{{$products->variant_id}}"><i class="fa fa-trash"></i></button>
                  @endif
              </td>

            </tr>
            @php $i++; @endphp
           
            @empty
            <tr>
              <td>No data found</td>
            </tr>
            @endforelse

          </tbody>
        </table>

      </div>
      @endif
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>
@foreach($productvarient as $products)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$products->variant_id}}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you want to delete this varient.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('deleteproductvariant',$products->variant_id)}}" class="btn btn-primary">Delete</a>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection