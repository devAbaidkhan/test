@extends('cityadmin.layout.app')

@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Packages List</h6>
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
        <a class="btn btn-success m-auto" style="float: right;" href="{{url('franchise-admin/packages/create')}}">Create New</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>Name</th>
                <th>Type</th>
                <th>Orders Quantity</th>
                <th>Dine In</th>
                <th>Take Away</th>
                <th>Delivery</th>
                <th>Price</th>
                <th>Days</th>
                <th>Action</th>

            </tr>
          </thead>
          <tbody>

          @forelse($packages as $package)

              <tr>
                  <td>
                      {{$package->name}}
                  </td>
                  <td>{{$package->type}}</td>
                  <td>{{$package->orders_quantity}}</td>
                  <td>{{($package->dinein== 0 ? 'Not Allowed':' Allowed')}}</td>
                  <td>{{($package->take_away == 0 ? 'Not Allowed':' Allowed')}}</td>
                  <td>{{($package->delivery == 0 ? 'Not Allowed':' Allowed')}}</td>
                  <td>{{$package->price}}</td>
                  <td>{{$package->days}}</td>
                  <td>

                      <a disabled href="{{--{{url('franchise-admin/packages/'.$package->id.'/edit')}}--}}" style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;padding-left: 9px;" style="color: #fff;">
                          <i class="fa fa-edit" style="width: 10px;"></i>
                      </a>

                      <!--<a href="" style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;padding-left: 9px;" style="color: #fff;">-->
                      <!--    <i class="fa fa-layer" style="width: 10px;"></i>-->
                      <!--</a>-->


                      <button type="button" style="width: 28px; padding-left: 6px;" class="btn btn-danger" data-toggle="modal" >
                          <i class="fa fa-trash"></i>
                      </button>
                  </td>
              </tr>

          @empty

             <td>No record found</td>

          @endforelse

          </tbody>
        </table>
        {{ $packages->links() }}
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>
{{--@foreach($cityfranchises as $cityfranchise)--}}
{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="exampleModal{{$cityfranchise->cityadmin_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--	<div class="modal-dialog" role="document">--}}
{{--		<div class="modal-content">--}}
{{--			<div class="modal-header">--}}
{{--				<h5 class="modal-title" id="exampleModalLabel">Delete cityadmin</h5>--}}
{{--					<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--						<span aria-hidden="true">&times;</span>--}}
{{--					</button>--}}
{{--			</div>--}}
{{--			<div class="modal-body">--}}
{{--				Are you want to delete cityadmin.--}}
{{--			</div>--}}
{{--			<div class="modal-footer">--}}
{{--				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--        <form class="forms-sample" action="{{route('city-franchise.destroy', $cityfranchise->cityadmin_id)}}" method="post"--}}
{{--          enctype="multipart/form-data">--}}
{{--          {{csrf_field()}}--}}
{{--          {{ method_field('DELETE') }}--}}
{{--				<button type="submit" class="btn btn-primary">Delete</button>--}}
{{--        </form>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</div>--}}
{{--@endforeach  --}}
 
@endsection

@push('js')
    <script>
        $(document).ready(function (){
            $('li').addClass('m-2')
        })
    </script>
@endpush