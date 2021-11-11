 		<!-- BEGIN #sidebar -->
		<div id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Navigation</div>
					<div class="menu-item active">
						<a href="{{route('resturant-index')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-laptop"></i></span>
							<span class="menu-text">Dashboard</span>
						</a>
					</div>
					@if (permission('view-banner-tab'))
			         <div class="menu-item">
						<a href="{{route('resturantbannervendor')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-image"></i></span>
							<span class="menu-text">Banner Management</span>
						</a>
					</div>
					@endif
					@if (permission('view-categories-tab'))
					<div class="menu-divider"></div>
					<div class="menu-header">Categories | Deals |  Products</div>
					<div class="menu-item">
						<a href="{{route('resturantcategory')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cube"></i></span>
							<span class="menu-text">Category</span>
						</a>
					</div>
					@endif
					@if (permission('view-product-tab'))
					<div class="menu-item">
						<a href="{{route('resturantproduct')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cog"></i></span>
							<span class="menu-text">Products</span>
						</a>
					</div>
					@endif
					<div class="menu-item">
						<a href="{{route('restaurant_addons.index')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cog"></i></span>
							<span class="menu-text">Addons</span>
						</a>
					</div>
					@if (permission('view-deal-product-tab'))
					<div class="menu-item">
						<a href="{{route('resturantdealroduct')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-shopping-basket"></i></span>
							<span class="menu-text">Deal Products</span>
						</a>
					</div>
					@endif
					@if (permission('view-bulk-product-tab'))
					<div class="menu-item">
						<a href="{{route('restaurantbulkup')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-upload"></i></span>
							<span class="menu-text">Bulk | Upload</span>
						</a>
					</div>
					@endif
					<div class="menu-divider"></div>
					<div class="menu-header"> OrderTaker </div>
					<div class="menu-item">
						<a href="{{route('restautrant_ordertaker.index')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-map-marker"></i></span>
							<span class="menu-text">Ordertaker</span>
						</a>
					</div>
					@if (permission('view-area-tab'))
					<div class="menu-divider"></div>
					<div class="menu-header">Area | Delivery Boy </div>
					<div class="menu-item">
						<a href="{{route('restaurantarea')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-map-marker"></i></span>
							<span class="menu-text">Area</span>
						</a>
					</div>
					@endif
					
					<div class="menu-item">
						<a href="{{route('resturantdelivery_boy')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-motorcycle"></i></span>
							<span class="menu-text">Delivery Boy</span>
						</a>
					</div>
					
					@if (permission('view-delivery-boy-commission'))
						<div class="menu-item">
						<a href="{{route('resturantdelivery_boy_comission')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-book"></i></span>
							<span class="menu-text">Delivery Boy Comission</span>
						</a>
						</div>
						<div class="menu-item">
							<a href="{{route('resturantcityadmindelivery_boy')}}" class="menu-link">
								<span class="menu-icon"><i class="fa fa-bicycle"></i></span>
								<span class="menu-text">City Admin Delivery Boys</span>
							</a>
						</div>
					@endif

					
					@if (permission('view-coupon-tab'))
				    <div class="menu-divider"></div>
					<div class="menu-header">Incentive |Coupon</div>
				    <div class="menu-item">
						<a href="{{route('resturantcouponlist')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-gift"></i></span>
							<span class="menu-text">Coupon</span>
						</a>
					</div>
					@endif
					@if (permission('view-today-orders-list'))
					<div class="menu-divider"></div>
					<div class="menu-header">Vendor | Orders | Comission</div>
					<div class="menu-item">
						<a href="{{route('today_order_restaurant')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cart-plus"></i></span>
							<span class="menu-text">Today | Order</span>
						</a>
					</div>
					@endif
					@if (permission('view-completed-orders-list'))
					{{-- <div class="menu-item">
						<a href="{{route('resturant_complete_order')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-thumbs-up"></i></span>
							<span class="menu-text">Completed | Order</span>
						</a>
					</div> --}}
					@endif
					@if (permission('view-admim-commission-list'))
					<div class="menu-item">
						<a href="{{route('resturantcomission')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-book"></i></span>
							<span class="menu-text">Admin | Comission</span>
						</a>
					</div>
					@endif
					@if (permission('create-delivery-time-slot'))
					<div class="menu-divider"></div>
					<div class="menu-header">Vendor | Settings</div>
				        <div class="menu-item">
						<a href="{{route('resturanttimeslot')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cog"></i></span>
							<span class="menu-text">Settings</span>
						</a>
					</div>
					@endif
					<div class="menu-divider"></div>
					<div class="menu-header">Campaigns</div>
					<div class="menu-item">
						<a href="{{route('restaurant.campaign.index')}}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-cube"></i></span>
							<span class="menu-text">Campaigns</span>
						</a>
					</div>
					
				</div>
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
			
			<!-- BEGIN mobile-sidebar-backdrop -->
			<button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
			<!-- END mobile-sidebar-backdrop -->
		</div>
		<!-- END #sidebar -->
		






 
