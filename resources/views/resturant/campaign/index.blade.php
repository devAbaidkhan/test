@extends('resturant.layout.app')
@push('css')
<style>
  .card-horizontal {
    display: flex;
    flex: 1 1 auto;
  }
</style>
@endpush
@section ('content')


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Compaigns List</h6>
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
      
    </div>
    <div class="card-body">
      @forelse ($campaigns as $campaign)
      <div class="card">
        <div class="card-horizontal">
          <div class="img-square-wrapper">
            <img class="" src='{{ asset("$campaign->banner") }}' alt="Card image Campaign">
          </div>
          <div class="card-body">
            <div class="col-md-12 bg-secondary">
              @php
                   $exists= App\Campaign::checkCampaignJoined($campaign->id,$vendor->vendor_id);
                   if(!$exists){
                     $href=route('restaurant.campaign.join',['campaign'=>$campaign->id]);
                     $status="Join";
                   }else{
                    $href=route('restaurant.campaign.joined.edit',['campaign_id'=>base64_url_encode($campaign->id)]);
                     $status="Joined";
                   }
                @endphp
              <a href="{{ $href }}"
                class="btn btn-success float-right col-md-3 btn-block">
                {{ $status }}
              </a>
            </div>
            <h4 class="card-title">{{ $campaign->title }}</h4>
            <p class="card-text">{{ $campaign->description }}</p>
          </div>
        </div>
      </div>
      @empty

      @endforelse
      {{ $campaigns->links("pagination::bootstrap-4") }}
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
</div>
{{-- @foreach($cityfranchises as $cityfranchise)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$cityfranchise->cityadmin_id}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form class="forms-sample" action="{{route('city-franchise.destroy', $cityfranchise->cityadmin_id)}}"
        method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-primary">Delete</button>
      </form>
    </div>
  </div>
</div>
</div>
@endforeach --}}

@endsection