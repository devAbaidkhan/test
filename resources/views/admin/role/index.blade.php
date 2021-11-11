@extends('admin.layout.app')

@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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
      <a class="btn btn-success m-auto" style="float: right;" href="{{route('role.create')}}">Add</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          @php
          $i=0;
          @endphp
          <tbody>
            @forelse ($roles as $role)
            <tr>
            <th>{{ ++$i }}</th>
            <th>{{ $role->name }}</th>
            <th>
              <a href="{{route('role.edit',$role->id)}}" style="width: 28px; padding-left: 6px;" class="btn btn-info"
                style="width: 10px;padding-left: 9px;" style="color: #fff;">
                <i class="fa fa-edit" style="width: 10px;"></i>
              </a>
              <button type="button" style="width: 28px; padding-left: 6px;" class="btn btn-danger" data-toggle="modal"
                data-target="#exampleModal{{$role->id}}">
                <i class="fa fa-trash"></i>
              </button>
            </th>
          </tr>
            @empty
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>
@forelse ($roles as $role)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$role->id}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      Are you want to delete Role.
    </div>
    <div class="modal-footer">
      <form action="{{ route('role.destroy',['role'=>$role->id]) }}" method="POST">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Delete</button>
      {!! method_field('delete') !!}
      {!! csrf_field() !!}
    </form>
    </div>
  </div>
</div>
</div> 
@empty
@endforelse
@endsection