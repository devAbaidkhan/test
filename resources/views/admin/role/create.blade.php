@extends('admin.layout.app')
@push('css')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        float: right;
    }

    /* Hide default HTML checkbox */
    .switch input {
        display: none;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    input.primary:checked+.slider {
        background-color: #2196F3;
    }
</style>

@endpush
@section ('content')
<div class="row">
    <div class="col-md-9" style="margin-top: 70px;margin-left: 250px">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Role</h4>
                <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                <form class="forms-sample" action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="">Role</label>
                        <input type="text" name="role" id="role" class="form-control" placeholder="e.g;City Admin" required>
                    </div>
                    <div class="col-md-12 row">
                        @forelse ($permissions as $permission)
                        <div class="col-md-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="permission[]"
                                        value="{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>

                            </div>

                        </div>
                        @empty
                        @endforelse

                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-success mr-2 ">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>