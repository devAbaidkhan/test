@extends('delivery_boy.layout.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.css"
    integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw=="
    crossorigin="anonymous" />
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




        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Details
                </h4>
                <label for="">Click If You Are Arrived At User Location</label>
                <a href="javascript:;" class="btn btn-primary " id="arrived_btn">Arrived</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                                <th colspan="4" class="text-center" style="background-color: #4b2769;color:white">User
                                    Details</th>
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
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Product List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                                <td>{{ $row->product_name }} {{ $addon_name!=''? '( '.$addon_name.' )' :'' }}</td>
                                <td><img class="img-thumbnail" width="40px" src="{{ asset("$row->product_image") }}"
                                        alt="">
                                </td>
                                <td>{{ $row->order_details_price }}</td>
                                <td>{{ $row->addon_price }}</td>
                                <td>{{ $row->product_quantity }}</td>
                                <td>{{ $row->total_price }}</td>
                                <td>{{ $row->order_description }}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
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

    </div>
    <!-- end content-->
</div>
<!--  end card  -->
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.js"
    integrity="sha512-jJHgrGWRvOyyVt4TghrM7L+HSb02QkXJPPBJhDIkiqEzUYWBKe76GVVsZggmjZWOmsPwS0WSPIvyUGZzJta8kg=="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#order_status').on('change', function () {

            var id = $(this).val();

            if (id == 3) {
                $('#cancelation_msg_div').show();
            } else {
                $('#cancelation_msg_div').hide();
            }
        });
        $('#order_status_btn').on('click', function () {
            var order_status = $('#order_status').val();
            var order_id = $('#order_id').val();
            var cancelation_msg = $('#cancelation_msg').val();
            if (order_status == 3) {
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
                        changeStatus(order_status, order_id, cancelation_msg);

                    }
                })
            } else {
                changeStatus(order_status, order_id, cancelation_msg);
            }
        });

        $('#arrived_btn').on('click', function () {
            var order_id = $('#order_id').val();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Arrived At User Location",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Yes, i'm arrived"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('delivery_boy.order_arrived') }}",
                        data: {
                            _token: "{{csrf_token()}}",
                            order_id: order_id,
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
            })
        });

    });

    function changeStatus(order_status, order_id, cancelation_msg) {
        $.ajax({
            type: "POST",
            url: "{{ route('delivery_boy.change_order_restaurant_status') }}",
            data: {
                _token: "{{csrf_token()}}",
                order_status: order_status,
                order_id: order_id,
                cancelation_msg: cancelation_msg,
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