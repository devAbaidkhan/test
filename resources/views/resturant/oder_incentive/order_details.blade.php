@extends('resturant.layout.app')
@push('css')

@endpush
@section ('content')
<!--content -->
<div class="content">
    <div class="container-fluid">
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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="order_status" id="order_status" class="form-control">
                                        <option value="" selected disabled>Select Option</option>
                                        @forelse ($order_status as $status)
                                        <option value="{{ $status->id }}"
                                            {{ $status->id==$order->order_status?'selected':'' }}
                                             {{ $status->id<$order->order_status?'disabled':'' }}
                                            >
                                            {{ $status->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group" @if ($order->order_status!=2)
                                    style="display: none"
                                    @endif id="order_confirmed_div">
                                    <label for="order_confirmed">Reason</label>
                                    <select name="order_confirmed" id="order_confirmed" class="form-control">
                                        <option value="" disabled selected>Select Time</option>
                                        <option value="15">15 Minutes</option>
                                        <option value="25">25 Minutes</option>
                                        <option value="35">35 Minutes</option>
                                        <option value="45">45 Minutes</option>
                                        <option value="55">55 Minutes</option>
                                        <option value="60">60 Minutes</option>
                                        <option value="75">75 Minutes</option>
                                    </select>
                                </div>
                                <div class="form-group" @if ($order->order_status!=4)
                                    style="display: none"
                                    @endif id="cancelation_msg_div">
                                    <label for="cancelation_msg">Reason</label>
                                    <textarea name="cancelation_msg" id="cancelation_msg" cols="30" rows="10"
                                        class="form-control">{{ $order->cancelation_msg }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" id="order_status_btn">Submit</button>
                                    <a href="{{ route('ordertaker.today_order_restaurant') }}"
                                        class="btn btn-danger float-right">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Assign Rider --}}
            @if($order->order_type=='deliver')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Assign Rider</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="delivery_boy_id" id="delivery_boy_id" class="form-control">
                                        <option value="" selected disabled>Select Option</option>
                                        @forelse ($delivery_boys as $delivery_boy)
                                        <option value="{{ $delivery_boy->delivery_boy_id }}"
                                            {{ $delivery_boy->delivery_boy_id==$order->delivery_boy_id?'selected':'' }}>
                                            {{ $delivery_boy->delivery_boy_name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" id="rider_btn">Submit</button>
                                    <a href="{{ route('ordertaker.today_order_restaurant') }}"
                                        class="btn btn-danger float-right">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <input type="hidden" value="{{ $order->id }}" id="order_id">
                            <th>Cart No#</th>
                            <td>{{ $order->cart_no }}</td>
                            <th>Order Date</th>
                            <td>{{ date('d/M/Y H:i:s', strtotime($order->created_at)) }}</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center" style="background-color: #4b2769;color:white">User Details</th>
                        </tr>
                        <tr>
                            <th>User Name</th>
                            <td>{{ $order->user_name }}</td>
                            <th>User Phone</th>
                            <td>{{ $order->user_phone }}</td>

                        </tr>
                        <tr>
                            <th colspan="1">User Address</th>
                            <td colspan="3">{{ $order->user_address }}</td>
                        </tr>
                        <tr>
                            <th colspan="1">User Order Suggestion</th>
                            <td colspan="3">{{ $order->user_order_suggestion }}</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center" style="background-color: #4b2769;color:white">Number of Total Buying</th>
                        </tr>
                        <tr>
                            <th colspan="1">Total Orders</th>
                            <td colspan="3">{{ $total_orders }}</td>

                        </tr>
                        <tr>
                            <th>Successfull Orders</th>
                            <td>{{ $completed_orders }}</td>
                            <th class="bg-danger text-white">Disputed Orders</th>
                            <td class="bg-danger text-white">{{ $disputed_orders }}</td>
                        </tr>
                        <tr>
                            <th>Pending Orders</th>
                            <td>{{ $pending_orders }}</td>
                            <th>Canceled Orders</th>
                            <td>{{ $canceled_orders }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Product List</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Product Price</th>
                        <th>Addon Price</th>
                        <th>Order Quantity</th>
                        <th>Total Price</th>
                        <th>Order Description</th>
                    </thead>
                    <tbody>
                        @forelse ($order_details as $row)
                        <tr>
                            @php
                        
                               $order_product_addons= DB::table('order_product_addons')
                                ->join('restaurant_product_addons','order_product_addons.restaurant_product_addon_id','=','restaurant_product_addons.id')
                                ->join('restaurant_addons','restaurant_product_addons.addon_id','=','restaurant_addons.addon_id')
                                ->where('order_product_addons.order_detail_id',$row->order_details_id)
                                ->select('order_product_addons.*','restaurant_addons.addon_name')
                                ->get();

                                $addon_name="";
                                foreach ($order_product_addons as $addon) {
                                    $addon_name.=$addon->addon_name.', ';
                                }
                            @endphp
                            <td>{{ $row->product_name }} {{ $addon_name!=''? '( '.$addon_name.' )' :'' }} 
                                <span class="badge float-right text-white" style="background-color:#4b2769;font-size: 16px ">{{ $row->is_campaign_product==1?" Compaign Product ":''  }}</span>
                            </td>
                            <td><img class="img-thumbnail" width="40px" src="{{ asset("$row->product_image") }}" alt="">
                            </td>
                            <td>{{ $row->order_details_price }}</td>
                            <td>{{ $row->addon_price }}</td>
                            <td>{{ $row->product_quantity }}</td>
                            <td>{{ $row->total_price }}</td>
                            <td>{{ $row->order_description }}</td>

                            @if ($row->is_campaign_product==1)
                            <tr class="bg-secondary">
                                <td colspan="7" class="text-center font-weight-bold">Free Product For Buying ({{ $row->product_name }})</td>
                            </tr>
                            <tr>
                                @php
                                $free_product=  App\Order::campaignFreeProductDetails($row->campaign_vendor_product_id);
                                @endphp
                                <td>{{ $free_product->product_name }} </td>
                                <td><img class="img-thumbnail" width="40px" src="{{ asset("$free_product->product_image") }}" alt=""> </td>
                                <td></td>
                                <td></td>
                                <td>{{ $free_product->quantity }}</td>
                                <td></td>
                            </tr>
                            @endif
                           
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <th>Total Price</th>
                            <td>{{ $order->currency.' '.$order->total_product_price }}</td>
                        </tr>
                        <tr>
                            <th>Delivary Charges</th>
                            <td>{{ !empty($order->delivery_charges)? $order->currency.' '.$order->delivery_charges:'' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Net Price</th>
                            <td>{{ $order->currency.' '.$order->net_amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- end content-->
</div>
<!--  end card  -->
@endsection
@push('js')

<script>
    $(document).ready(function () {
        var order_user_id="{{$order->user_id}}";
        
        $('#order_status').on('change', function () {

            var id = $(this).val();

            if (id == 2) {
                $('#order_confirmed_div').show();
            } else {
                $('#order_confirmed_div').hide();
            }
            if (id == 4) {
                $('#cancelation_msg_div').show();
            } else {
                $('#cancelation_msg_div').hide();
            }
        });
        $('#order_status_btn').on('click', function () {
            var order_status = $('#order_status').val();
            var order_id = $('#order_id').val();
            var cancelation_msg = $('#cancelation_msg').val();
            var order_confirmed = $('#order_confirmed').val();
            if (order_status == 4) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want To Cancel The Order!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        changeStatus(order_status, order_id, cancelation_msg,order_confirmed);

                    }
                })
            } else {
                changeStatus(order_status, order_id, cancelation_msg,order_confirmed);
            }
        });

        $('#rider_btn').on('click', function () {
            var order_status = $('#order_status').val();
            var order_id = $('#order_id').val();
            var delivery_boy_id = $('#delivery_boy_id').val();
            if(order_status!=2){
                    alertMsg('Please Confirm Your Order First','error');
                    return false;
            }
            $.ajax({
                type: "POST",
                url: "{{ route('restrurent.order.assign.rider') }}",
                data: {
                    _token: "{{csrf_token()}}",
                    order_id: order_id,
                    delivery_boy_id: delivery_boy_id,
                    order_user_id:order_user_id,
                },
                beforeSend:function(){
                    loader();
                },
                success: function (data) {
                    Swal.close();
                    if (data.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else if (data.status == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },error:function(){
                    Swal.close();
                }
            });
        });
    });


    function changeStatus(order_status, order_id, cancelation_msg,order_confirmed) {
        $.ajax({
            type: "POST",
            url: "{{ route('change_order_restaurant_status') }}",
            data: {
                _token: "{{csrf_token()}}",
                order_status: order_status,
                order_id: order_id,
                cancelation_msg: cancelation_msg,
                order_confirmed: order_confirmed,
            },
            success: function (data) {
                if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: data.msg,
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else if (data.status == 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: data.msg,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    }
</script>
@endpush