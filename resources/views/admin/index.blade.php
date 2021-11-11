@extends('admin.layout.app')

@section ('content')



        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            	<h1 class="page-header mb-3">
				Hi, {{$admin->admin_name}}. <small>here's what's happening with your store today.</small>
			</h1>
          </div>

          <!-- BEGIN row -->
            <div class="row">
                <!-- BEGIN col-6 -->
                
                <!-- END col-6 -->
                
                <!-- BEGIN col-6 -->
                <div class="col-xl-12">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-6 -->
                        <div class="col-sm-6">
                            <!-- BEGIN card -->
                            <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-orange" style="min-height: 202px;">
                                <!-- BEGIN card-img-overlay -->
                                <div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
                                    <img src="{{url('assets/img/icon/order.svg')}}" alt="" class="ml-auto d-block mb-n3" style="max-height: 105px" />
                                </div>
                                <!-- END card-img-overlay -->
                                
                                <!-- BEGIN card-body -->
                                <div class="card-body position-relative">
                                    <h5 class="text-white-transparent-8 mb-3 fs-16px">Total Orders</h5>
                                    <h3 class="text-white mt-n1"></h3>
                                    <div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
                                        <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                                    </div>
                                    <div class="text-white-transparent-8 mb-4"></i> here is the count of total<br />Confirmed Order</div>
                                    
                                </div>
                                <!-- BEGIN card-body -->
                            </div>
                            <!-- END card -->
                            
                            <!-- BEGIN card -->
                            <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-teal" style="min-height: 202px;">
                                <!-- BEGIN card-img-overlay -->
                                <div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
                                    <img src="{{url('assets/img/icon/visitor.svg')}}" alt="" class="ml-auto d-block mb-n3" style="max-height: 105px" />
                                </div>
                                <!-- END card-img-overlay -->
                                
                                <!-- BEGIN card-body -->
                                <div class="card-body position-relative">
                                    <h5 class="text-white-transparent-8 mb-3 fs-16px">Total Partners</h5>
                                    <h3 class="text-white mt-n1"></h3>
                                    <div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
                                        <div class="progrss-bar progress-bar-striped bg-white" style="width: 50%"></div>
                                    </div>
                                    <div class="text-white-transparent-8 mb-4"></i>here all your partners <br />add by Franchise Admin</div>
                                    
                                </div>
                                <!-- END card-body -->
                            </div>
                            <!-- END card -->
                        </div>
                        <!-- END col-6 -->
                        
                        <!-- BEGIN col-6 -->
                        <div class="col-sm-6">
                            <!-- BEGIN card -->
                            <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-pink" style="min-height: 202px;">
                                <!-- BEGIN card-img-overlay -->
                                <div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
                                    <img src="{{url('assets/img/icon/email.svg')}}" alt="" class="ml-auto d-block mb-n3" style="max-height: 105px" />
                                </div>
                                <!-- END card-img-overlay -->
                                
                                <!-- BEGIN card-body -->
                                <div class="card-body position-relative">
                                    <h5 class="text-white-transparent-8 mb-3 fs-16px">Completed Orders</h5>
                                    <h3 class="text-white mt-n1"></h3>
                                    <div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
                                        <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                                    </div>
                                    <div class="text-white-transparent-8 mb-4"></i> here is the count<br /> of all the completed orders</div>
                                   
                                </div>
                                <!-- END card-body -->
                            </div>
                            <!-- END card -->
                            
                            <!-- BEGIN card -->
                            <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-indigo" style="min-height: 202px;">
                                <!-- BEGIN card-img-overlay -->
                                <div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
                                    <img src="{{url('assets/img/icon/browser.svg')}}" alt="" class="ml-auto d-block mb-n3" style="max-height: 105px" />
                                </div>
                                <!-- end card-img-overlay -->
                                
                                <!-- BEGIN card-body -->
                                <div class="card-body position-relative">
                                    <h5 class="text-white-transparent-8 mb-3 fs-16px">Franchise</h5>
                                    <h3 class="text-white mt-n1"></h3>
                                    <div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
                                        <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                                    </div>
                                    <div class="text-white-transparent-8 mb-4"></i>here is the count <br />of all the Franchise</div>
                                    
                                </div>
                                <!-- END card-body -->
                            </div>
                            <!-- END card -->
                        </div>
                        <!-- BEGIN col-6 -->
                    </div>
                    <!-- END row -->
                </div>
                <!-- END col-6 -->
            </div>
            <!-- END row -->
            
            <!-- BEGIN row -->
            <div class="row">
                <!-- BEGIN col-6 -->
                <div class="col-xl-6">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-6 -->
                        <div class="col-6">
                            <!-- BEGIN card -->
                            <div class="card mb-3">
                                <!-- BEGIN card-body -->
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1">Total Users</h5>
                                            <div> User account registration</div>
                                        </div>
                                        <a href="#" data-toggle="dropdown" class="text-muted"></i></a>
                                    </div>
                                    
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h3 class="mb-1"></h3>
                                            <div class="text-success font-weight-600 fs-13px">
                                                <i class="fa fa-caret-up"></i>
                                            </div>
                                        </div>
                                        <div class="width-50 height-50 bg-primary-transparent-2 rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-user fa-lg text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- END card-body -->
                            </div>
                            <!-- END card -->
                            
                            <!-- BEGIN card -->
                            <div class="card mb-3">
                                <!-- BEGIN card-body -->
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1">App Feedback</h5>
                                            <div>support quries & order Complaints</div>
                                        </div>
                                        <a href="#" data-toggle="dropdown" class="text-muted"></i></a>
                                    </div>
                                    
                                    <!-- BEGIN row -->
                                    <div class="row">
                                        <!-- BEGIN col-6 -->
                                        <div class="col-6 text-center">
                                            <div class="width-50 height-50 bg-primary-transparent-2 rounded-circle d-flex align-items-center justify-content-center mb-2 ml-auto mr-auto">
                                                <i class="fa fa-bullhorn"></i>
                                            </div>
                                            <div class="font-weight-600 text-dark"></div>
                                            <div class="fs-13px">Order Complaints</div>
                                        </div>
                                        <!-- END col-6 -->
                                        
                                        <!-- BEGIN col-6 -->
                                        <div class="col-6 text-center">
                                            <div class="width-50 height-50 bg-primary-transparent-2 rounded-circle d-flex align-items-center justify-content-center mb-2 ml-auto mr-auto">
                                                <i class="fa fa-comments fa-lg text-primary"></i>
                                            </div>
                                            <div class="font-weight-600 text-dark"></div>
                                            <div class="fs-13px">Feedbacks</div>
                                        </div>
                                        <!-- END col-6 -->
                                    </div>
                                    <!-- END row -->
                                </div>
                                <!-- END card-body -->
                            </div>
                            <!-- END card -->
                        </div>
                        <!-- END col-6 -->
                        
                        <!-- BEGIN col-6 -->
                        <div class="col-6">
                             <!--BEGIN card -->
                            <div class="card mb-3"> 
                                 <!--BEGIN card-body -->
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1">App share</h5>
                                            <div class="fs-13px">total share & amount get by user</div>
                                        </div>
                                        <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-redo"></i></a>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h3 class="mb-1"></h3>
                                        <div class="text-success fs-13px font-weight-600">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="progress mb-4" style="height: 10px;">
                                        <div class="progress-bar" style="width: 42.66%"></div>
                                        <div class="progress-bar bg-teal" style="width: 36.80%"></div>
                                        <div class="progress-bar bg-yellow" style="width: 15.34%"></div>
                                        <div class="progress-bar bg-pink" style="width: 9.20%"></div>
                                        <div class="progress-bar bg-gray-200" style="width: 5.00%"></div>
                                    </div>
                                    
                                    <div class="fs-13px">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-grow-1 d-flex align-items-center">
                                                <i class="fa fa-circle fs-9px fa-fw text-primary mr-2"></i> Today Share
                                            </div>
                                            <div class="font-weight-600 text-dark"></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-grow-1 d-flex align-items-center">
                                                <i class="fa fa-circle fs-9px fa-fw text-teal mr-2"></i> Next Day
                                            </div>
                                            <div class="font-weight-600 text-dark">36.80%</div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-grow-1 d-flex align-items-center">
                                                <i class="fa fa-circle fs-9px fa-fw text-warning mr-2"></i> Week
                                            </div>
                                            <div class="font-weight-600 text-dark">15.34%</div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-grow-1 d-flex align-items-center">
                                                <i class="fa fa-circle fs-9px fa-fw text-danger mr-2"></i> Month 
                                            </div>
                                            <div class="font-weight-600 text-dark">9.20%</div>
                                        </div>
                                        <div class="d-flex align-items-center mb-15px">
                                            <div class="flex-grow-1 d-flex align-items-center">
                                                <i class="fa fa-circle fs-9px fa-fw text-gray-200 mr-2"></i> Year
                                            </div>
                                            <div class="font-weight-600 text-dark">5.00%</div>
                                        </div>
                                        <div class="fs-12px text-right">
                                            <span class="fs-10px">powered by </span>
                                            <span class="d-inline-flex font-weight-600">
                                                <span class="text-primary">D</span>
                                                <span class="text-primary">e</span>
                                                <span class="text-primary">d</span>
                                                <span class="text-primary">o</span>
                                                
                                            </span>
                                            <span class="fs-10px">made with <i class="fa fa-heart" aria-hidden="true"></i>
                                                            </span>
                                        </div>
                                    </div>
                                </div>
                                 <!--END card-body -->
                            </div>
                             <!--END card -->
                        </div>
                         <!--END col-6 -->
                    </div>
                     <!--END row -->
                </div>
                 <!--END col-6 -->
                
                 <!--BEGIN col-6 -->
                {{-- <div class="col-xl-6">
                     <!--BEGIN card -->
                     <div class="card">
                         <!--BEGIN card-body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Transaction</h5>
                                    <div class="fs-13px">Latest transaction history</div>
                                </div>
                                
                            </div>
                            
                             <!--BEGIN table-responsive -->
                            <div class="table-responsive mb-n2">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th class="pl-0">No</th>
                                            <th>Cart id</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-right pr-0">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($recent_order)>0)
                                          @php $i=1; @endphp
                                          @foreach($recent_order as $recent_orders)
                         <tr>
                            <td>{{$i}}</td>
                                            <td>
                                                    <div class="ml-3 flex-grow-1">
                                                        <div class="font-weight-600 text-dark">{{$recent_orders->cart_id}}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center"><span class="label bg-success-transparent-2 text-success" style="min-width: 60px;">{{$recent_orders->payment_status}}</span></td>
                                            <td class="text-right pr-0">{{$currency->currency_sign}}{{$recent_orders->rem_price}}</td>
                            
                          
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
                             <!--END table-responsive -->
                        </div>
                         <!--END card-body -->
                    </div>
                    </div>
                     <!--END card -->
                </div> --}}
                 <!--END col-6 -->
                
                 
            </div>
             <!--END row -->
        </div>
@endsection