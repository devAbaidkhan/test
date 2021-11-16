@extends('cityadmin.layout.app')

@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Partner</h6>
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
      <form action="{{ route('searchvendor') }}" method="post">
        {{csrf_field()}}
        <input type="text" value="" name="vendorname" class="form-control" placeholder="Enter Partner Name"
          style="width: 20%; display: inline;">
        <button type="submit" class="btn btn-success btn-md" value="Search" style="margin-top: -5px;"><i
            class="fa fa-search"></i></button>
      </form>
      @if(permission('create-partner'))
      <a class="btn btn-success m-auto" style="float: right;" href="{{route('add-vendor')}}">Add</a>
      @endif
    </div>
    @if(permission('view-partner-list'))
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Partner Name</th>
              <th>Owner Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Active Packages</th>
              <th>logo</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @if(count($vendor)>0)
            @php $i=1; @endphp
            @foreach($vendor as $vendors)
            <tr>
              <td>{{$i}}</td>
              <td>{{$vendors[0]->vendor_name}}</td>
              <td>{{$vendors[0]->owner}}</td>
              <td>{{$vendors[0]->vendor_phone}}</td>
              <td>{{$vendors[0]->vendor_email}}</td>
              <td class="text-center" > <span style="cursor: pointer" class="badge badge-{{(count($vendors->where('vend_id','!=',null)) == 0 ? 'warning':'primary ')}} package" vendors="{{json_encode($vendors)}}">
                  {{count($vendors->where('vend_id','!=',null))}}
                </span> </td>
              <td align="center"><img src="{{asset($vendors[0]->vendor_logo)}}" style="width: 21px;"></td>
              <td>
                @if(permission('partner-secret-login'))
                <a href="{{route('vendorsecretlogin',$vendors[0]->vendor_id)}}"
                  style="width: 28px; padding-left: 6px;background-color:#000;border-color:#000;" class="btn btn-info"
                  style="width: 10px;padding-left: 9px;" style="color: #fff;">
                  <i class="fa fa-user-secret" style="width: 10px;"></i>
                </a>
                @endif
                @if(permission('update-partner'))
                <a href="{{route('edit-vendor',$vendors[0]->vendor_id)}}" style="width: 28px; padding-left: 6px;"
                  class="btn btn-info" style="width: 10px;padding-left: 9px;" style="color: #fff;">
                  <i class="fa fa-edit" style="width: 10px;"></i>
                </a>
                @endif
                @if(permission('delete-partner'))
                <button type="button" style="width: 28px; padding-left: 6px;" class="btn btn-danger" data-toggle="modal"
                  data-target="#exampleModal{{$vendors[0]->vendor_id}}">
                  <i class="fa fa-trash"></i>
                </button>
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
      </div>
    </div>
    @endif
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>

<div class="modal fade" id="modal_package" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h3 class="modal-title" id="exampleModalLabel">Subscribed Packages</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th>Name</th>
              <th>Type</th>
              <th>Orders</th>
              <th>Price</th>
              <th>Action</th>

            </tr>
            </thead>

            <tbody id="modal-pkg-list">

            </tbody>
          </table>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--        <a href="" class="btn btn-primary">Delete</a>--}}
      </div>
    </div>
  </div>
</div>

@foreach($vendor as $key => $vendors)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete vendor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you want to delete vendor.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('delete-vendor', $key)}}" class="btn btn-primary">Delete</a>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

@push('js')


  <script>
    $(document).ready(function (){

      $('.package').on('click',function (){
        $('#modal_package').modal('show')
        let vendors = JSON.parse($(this).attr('vendors'))
        console.log(vendors)
        $('#modal-pkg-list').empty()
        $.each(vendors,function (i,package){

          if(package.vend_id)
          {
            $('#modal-pkg-list').append('' +
                    '  <tr>' +
                    ' <td>'+package.name+'</td>' +
                    '<td>'+package.type+'</td>' +
                    '<td>'+package.orders_quantity+'</td>' +
                    '<td>'+package.price+'</td>' +
                    '<td>   <button type="button" style="width: 28px; padding-left: 6px;" class="btn btn-danger"  > <i class="fa fa-trash"></i> </button></td>' +
                    '</tr>')
          }
        })


      })
    })
  </script>
@endpush
