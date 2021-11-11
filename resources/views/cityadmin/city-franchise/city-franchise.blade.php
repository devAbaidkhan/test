@extends('cityadmin.layout.app')

@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">City Franchise List</h6>
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
        <a class="btn btn-success m-auto" style="float: right;" href="{{route('city-franchise.create')}}">Add</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>S.No</th>
            <th>Country</th>
            <th>City</th>
            <th>Admin Name</th>
            <th>Admin Mobile</th>
            <th>Admin Email</th>
            <th>Role</th>
            <th>Admin Image</th>
           {{--  <th>Store</th> --}}
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
                          @php $i=1; @endphp
                           @forelse($cityfranchises as $cityfranchise)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$cityfranchise->country}}</td>
                            <td>{{$cityfranchise->city}}</td>
                            <td>{{$cityfranchise->cityadmin_name}}</td>
                            <td>{{$cityfranchise->cityadmin_phone}}</td>
                            <td>{{$cityfranchise->cityadmin_email}}</td>
                            <td>{{$cityfranchise->role_name}}</td>
                            <td align="center">
                             
                              <img class="img-thumbnail" src="{{ asset($cityfranchise->cityadmin_image) }}" style="width: 50px;" alt="">
                            </td>
                           {{--  <td>
                                <a href="{{route('cityadminvendorlist',$cityfranchise->cityadmin_id)}}"button type="button" class="btn btn-success">Stores</button></a>
                              </td> --}}
                            <td>
                               
                                <a href="{{route('city-franchise.edit',['city_franchise'=>$cityfranchise->cityadmin_id])}}" style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;padding-left: 9px;" style="color: #fff;">
                                    <i class="fa fa-edit" style="width: 10px;"></i>
                                </a>
                                
                                <!--<a href="" style="width: 28px; padding-left: 6px;" class="btn btn-info" style="width: 10px;padding-left: 9px;" style="color: #fff;">-->
                                <!--    <i class="fa fa-layer" style="width: 10px;"></i>-->
                                <!--</a>-->
                                
                                
							    <button type="button" style="width: 28px; padding-left: 6px;" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$cityfranchise->cityadmin_id}}">
							        <i class="fa fa-trash"></i>
							    </button>
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
        {{ $cityfranchises->links() }}
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>
@foreach($cityfranchises as $cityfranchise)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$cityfranchise->cityadmin_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete cityadmin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				Are you want to delete cityadmin.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form class="forms-sample" action="{{route('city-franchise.destroy', $cityfranchise->cityadmin_id)}}" method="post"
          enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('DELETE') }}
				<button type="submit" class="btn btn-primary">Delete</button>
        </form>
			</div>
		</div>
	</div>
</div>
@endforeach  
 
@endsection