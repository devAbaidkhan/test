@extends('cityadmin.layout.app')

@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Area</h6>
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
      @if(permission('create-area'))
      <a class="btn btn-success m-auto" style="float: right;" href="{{route('add-area')}}">Add</a>
      @endif
    </div>
    @if(permission('view-area-list'))
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>area Name</th>
              <th>Delivery Charges</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.No</th>
              <th>area Name</th>
              <th>Delivery Charge</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @if(count($area)>0)
            @php $i=1; @endphp
            @foreach($area as $areas)
            <tr>
              <td>{{$i}}</td>
              <td>{{$areas->area_name}}</td>
              <td>{{$areas->delivery_charge}}</td>
              <td>
                @if(permission('delete-area'))
                <button type="button" style="width: 28px; padding-left: 6px;" class="btn btn-danger" data-toggle="modal"
                  data-target="#exampleModal{{$areas->area_id}}"><i class="fa fa-trash"></i></button>
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
            {!! $area->links("pagination::bootstrap-4") !!}
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>
@foreach($area as $areas)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$areas->area_id}}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you want to delete area.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('delete-area', $areas->area_id)}}" class="btn btn-primary">Delete</a>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection