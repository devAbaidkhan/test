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
                <th>Delivery</th>
                <th>Dine In</th>
                <th>Take Away</th>
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
                  <td>{{($package->delivery == 0 ? 'Not Allowed':' Allowed')}}</td>
                  <td>{{($package->dinein== 0 ? 'Not Allowed':' Allowed')}}</td>
                  <td>{{($package->take_away == 0 ? 'Not Allowed':' Allowed')}}</td>
                  <td>{{$package->price}}</td>
                  <td>{{$package->days}}</td>
                  <td>

                      <a href="{{url('franchise-admin/packages/'.$package->id.'/edit')}}" style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;padding-left: 9px;" style="color: #fff;">
                          <i class="fa fa-edit" style="width: 10px;"></i>
                      </a>

                      <!--<a href="" style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;padding-left: 9px;" style="color: #fff;">-->
                      <!--    <i class="fa fa-layer" style="width: 10px;"></i>-->
                      <!--</a>-->


                      <button type="button" style="width: 28px; padding-left: 6px;" deleteId="{{$package->id}}" class="btn btn-danger delete_item"  >
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white" style="">
                <h4><i class="fa fa-trash"></i> Are you want to Delete This Item..?</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form class="forms-sample" action="{{url('franchise-admin/packages/destroy')}}" method="post"
          enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('DELETE') }}
            <input type="hidden" name="delete_item" id="delete_item">
				<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
        </form>
			</div>
		</div>
	</div>
</div>
 
@endsection

@push('js')
    <script>
        $(document).ready(function (){
            $('li').addClass('m-2')
            $('.delete_item').on('click',function (){
                let deleteId = $(this).attr('deleteId')
                $('#delete_item').val(deleteId);
                $('#exampleModal').modal('show')
            })
        })
    </script>
@endpush