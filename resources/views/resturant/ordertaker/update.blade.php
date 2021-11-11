@extends('resturant.layout.app')

@section ('content')
<style>
  input.form-control.file-upload-info {
    padding: 3px;
    border: 0px;
  }
</style>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Ordertaker</h4>
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
          <form class="forms-sample" action="{{route('restautrant_ordertaker.update',['restautrant_ordertaker'=>$ordertaker->id])}}" method="post"  enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required value="{{ $ordertaker->name }}">
             
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $ordertaker->email }}">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required value="{{ $ordertaker->phone }}">
             
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
               
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Enter Confirm Password">
            </div>
            @if (permission('create-categories'))
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            @endif
            <!--
                    <button class="btn btn-light">Cancel</button>
                    -->
            <a href="{{route('restautrant_ordertaker.index')}}" class="btn btn-light">Cancel</a>
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