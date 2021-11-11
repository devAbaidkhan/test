 		<!-- BEGIN #sidebar -->
 		<div id="sidebar" class="app-sidebar">
 			<!-- BEGIN scrollbar -->
 			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
 				<!-- BEGIN menu -->
 				<div class="menu">
 					<div class="menu-header">Navigation</div>
 					<div class="menu-item active">
 						<a href="{{route('cityadmin-index')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-laptop"></i></span>
 							<span class="menu-text">Dashboard</span>
 						</a>
 					</div>
 					@php
 					$role= Session::get('role');
 					@endphp
 					<div class="menu-divider"></div>
 					<div class="menu-header">Notification | User | Vendor</div>
 					@if(permission('notification-user',$role))
 					<div class="menu-item">

 						<a href="{{route('cityadminNotification')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-bell"></i></span>
 							<span class="menu-text">To User</span>
 						</a>
 					</div>
 					@endif
 					@if(permission('notification-store',$role))
 					<div class="menu-item">
 						<a href="{{route('CNotification_to_store')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-bell"></i></span>
 							<span class="menu-text">To Store</span>
 						</a>
 					</div>
 					@endif


 					<div class="menu-divider"></div>
 					<div class="menu-header">| Delivery Boy | Area</div>
 					@if(permission('view-delivery-boy-tab',$role))
 					<div class="menu-item">
 						<a href="{{route('delivery_boy')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-male"></i></span>
 							<span class="menu-text">Delivery Boy</span>
 						</a>
 					</div>
 					@endif
 					@if(permission('view-delivery-boy-commission',$role))
 					{{-- <div class="menu-item">
 						<a href="{{route('cdelivery_boy_comission')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-male"></i></span>
 							<span class="menu-text">Delivery Boy Comission</span>
 						</a>
 					</div> --}}
 					@endif
 					@if(permission('view-area-tab',$role))
 					<div class="menu-item">
 						<a href="{{route('area')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-map-marker"></i></span>
 							<span class="menu-text">Area</span>
 						</a>
 					</div>
 					@endif
 					{{-- City Franchise --}}
					 @if ($role=='CountryFranchise')
					 <div class="menu-divider"></div>
 					<div class="menu-header">City Franchise</div>
 					<div class="menu-item">
 						<a href="{{route('city-franchise.index')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-users"></i></span>
 							<span class="menu-text">City Franchise</span>
 						</a>
 					</div>
					 <div class="menu-divider"></div>
 					<div class="menu-header">Compaigns</div>
 					<div class="menu-item">
 						<a href="{{route('campaign.index')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-users"></i></span>
 							<span class="menu-text">Compaigns</span>
 						</a>
 					</div>

					 <div class="menu-item">
 						<a href="{{route('campaign.index')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-users"></i></span>
 							<span class="menu-text">Packages</span>
 						</a>
 					</div>
					 @endif
 					{{-- partners --}}
					 @if ($role=='CityFranchise')
 					<div class="menu-divider"></div>
 					<div class="menu-header">Partners | Orders</div>
 					@if(permission('view-partner-tab',$role))
 					<div class="menu-item">
 						<a href="{{route('vendor')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-users"></i></span>
 							<span class="menu-text">Partners</span>
 						</a>
 					</div>
 					@endif
					 @endif

 					@if(permission('view-orders-tab',$role))
 					<div class="menu-item">
 						<a href="{{route('vendor_list')}}" class="menu-link">
 							<span class="menu-icon"><i class="fa fa-bullseye"></i></span>
 							<span class="menu-text">Today | Completed</span>
 						</a>
 					</div>
 					@endif

 				</div>
 				<!-- END menu -->
 			</div>
 			<!-- END scrollbar -->

 			<!-- BEGIN mobile-sidebar-backdrop -->
 			<button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
 			<!-- END mobile-sidebar-backdrop -->
 		</div>
 		<!-- END #sidebar -->