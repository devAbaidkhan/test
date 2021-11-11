@extends('resturant.layout.app')

@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All OrderTaker</h6>
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
     
      @if (permission('create-categories'))
      <a class="btn btn-success m-auto" style="float: right;" href="{{route('restautrant_ordertaker.create')}}">Add</a>
      @endif

    </div>
    <div class="card-body">
      @if ('view-categories-list')
      <div class="table-responsive">
        <table class="table table-bordered" id="example6" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @php $i=1; @endphp
            @forelse ($ordertakers as $ordertaker)
            <td>{{$i++}}</td>
            <td>{{ $ordertaker->name }}</td>
            <td>{{ $ordertaker->email }}</td>
            <td>{{ $ordertaker->phone }}</td>
            <td>{{ date('d-M-Y h:s:i a',strtotime($ordertaker->created_at)) }}</td>
            <td>
              @if (permission('update-categories'))
              <a href="{{route('restautrant_ordertaker.edit', ['restautrant_ordertaker'=>$ordertaker->id])}}"
                class="btn btn-primary">Edit</a>
              @endif
              @if (permission('delete-categories'))
              <a href="javascript:;"
                class="btn btn-danger" data-toggle="modal"
                data-target="#exampleModal{{$ordertaker->id}}">Delete</a>
              @endif
            </td>
            @empty
            @endforelse
          </tbody>
        </table>
        {!! $ordertakers->links("pagination::bootstrap-4") !!}
      </div>
      @endif
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
@forelse($ordertakers as $ordertaker)
<!-- Modal -->
<form action="{{route('restautrant_ordertaker.destroy', ['restautrant_ordertaker'=>$ordertaker->id])}}" id="delete_form{{$ordertaker->id}}" method="POST">
  {{ csrf_field() }}
  {{ method_field('delete') }}
<div class="modal fade" id="exampleModal{{$ordertaker->id}}" tabindex="-1" role="dialog"
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
        Are you want to delete ordertaker
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
        
      </div>
    </div>
  </div>
</div>
</form>
@empty
    
@endforelse

@endsection