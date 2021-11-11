@extends('resturant.layout.app')

@section ('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-1">
    </div>

    <div class="col-md-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Join Campaign</h4>
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
          <form class="forms-sample" action="{{route('restaurant.campaign.join.update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-basic-tab" data-toggle="tab" href="#nav-basic" role="tab"
                  aria-controls="nav-basic" aria-selected="true">Basic Information</a>
                <a class="nav-item nav-link" id="nav-products-tab" data-toggle="tab" href="#nav-products" role="tab"
                  aria-controls="nav-products" aria-selected="false">Campaign Products</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              {{-- Basic Information Tab start --}}
              <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
                <div class="card mt-3">
                  <div class="card-horizontal">
                    <div class="img-square-wrapper">
                      <img class="" src='{{ asset("$campaign->banner") }}' alt="Card image Campaign">
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">{{ $campaign->title }}</h4>
                      <p class="card-text">{{ $campaign->description }}</p>
                    </div>
                  </div>
                </div>
              </div>
              {{-- Basic Information Tab End --}}
              {{-- Campaign Products Tab Start --}}
              <div class="tab-pane fade" id="nav-products" role="tabpanel" aria-labelledby="nav-products-tab">
                @if ($campaign_vendor->first()->campaign_type_id==1)
                @include('resturant.campaign.joined_campaign_types.buy_1_get_1_free')
                @elseif($campaign_vendor->first()->campaign_type_id==2 || $campaign->first()->campaign_type_id==3)
                @include('resturant.campaign.joined_campaign_types.type_2_&_3')
                @endif
              </div>
              {{-- Campaign Products Tab End --}}
            </div>
            <div class="form-group mt-2">
              <input type="hidden" value="{{ $campaign->id }}" name="campaign_id">
              <input type="hidden" value="{{ $campaign_vendor->first()->campaign_type_id }}" name="campaign_type_id">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('restaurant.campaign.index') }}" class="btn btn-danger float-right">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-2">
    </div>

  </div>
</div>
</div>


@endsection