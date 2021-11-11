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
      <h6 class="text-primary card-title">Addons</h6>
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
      <a class="btn btn-info" href="{{route('restaurant_addons.sortinglist')}}">Sorting List</a>
      @if(permission('create-addons-product'))
      <a class="btn btn-success m-auto" style="float: right;" href="{{route('restaurant_addons.create')}}">Add
        Addons</a>
      @endif
    </div>
    <div class="card-body">
      @if(permission('view-addons-product-list'))
      <div class="table-responsive">
        <table class="table table-bordered" id="example8" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr#</th>
              <th>Addon Name</th>
              <th>Addon Price</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @if(count($restaurant_addons)>0)
            @php $i=1; @endphp
            @foreach($restaurant_addons as $restaurant_addon)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{$restaurant_addon->addon_name}}</td>
              <td>{{$restaurant_addon->addon_price}}</td>



              <td>
                @if(permission('update-addons-product'))
                <a href="{{route('restaurant_addons.edit',$restaurant_addon->addon_id)}}"
                  style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;padding-left: 9px;"
                  style="color: #fff;"><i class="fa fa-edit" style="width: 10px;"></i></a>
                @endif
                @if(permission('delete-addons-product'))
                <button type="button" style="width: 28px; padding-left: 6px;" class="btn btn-danger" data-toggle="modal"
                  data-target="#exampleModal{{$restaurant_addon->addon_id}}"><i class="fa fa-trash"></i></button>
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
        {{ $restaurant_addons->links("pagination::bootstrap-4") }}
      </div>
      @endif
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>
@foreach($restaurant_addons as $restaurant_addon)
<!-- Modal -->
<form action="{{ route('restaurant_addons.destroy',$restaurant_addon->addon_id) }}" method="POST">
{{ method_field("DELETE") }}
{{ csrf_field() }}
<div class="modal fade" id="exampleModal{{$restaurant_addon->addon_id}}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Addon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you want to delete this Addon.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>
</form>
@endforeach
@endsection