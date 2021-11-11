<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Ordertaker | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<!-- ================== BEGIN core-css ================== -->
	<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" />
	<link href="{{asset('css/backend.css')}}" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- ================== END core-css ================== -->
	<!-- ================== Jquery ================== -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- ================== End Jquery ================== -->
	<!-- ================== BEGIN Toastr ================== -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<!-- ================== END Toastr ================== -->
	<script src="https://www.gstatic.com/firebasejs/8.5.0/firebase.js"></script>
	<script src="{{ asset('assets/js/notification.js') }}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.css"
		integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw=="
		crossorigin="anonymous" />
	@stack('css')

</head>

<body>
	<!-- BEGIN #app -->
	<div id="app" class="app">

		@include('delivery_boy.layout.header')

		@include('delivery_boy.layout.sidebar')
		<!-- BEGIN #content -->
		<div id="content" class="app-content">

			@yield('content')

		</div>
		<!-- END #content -->

		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
	<!-- END #app -->

	<!-- ================== BEGIN core-js ================== -->
	<script src="{{url('assets/js/app.min.js')}}"></script>
	<!-- ================== END core-js ================== -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.js"
		integrity="sha512-jJHgrGWRvOyyVt4TghrM7L+HSb02QkXJPPBJhDIkiqEzUYWBKe76GVVsZggmjZWOmsPwS0WSPIvyUGZzJta8kg=="
		crossorigin="anonymous"></script>

	<!-- ================== BEGIN page-js ================== -->
	{{-- <script src="{{url('assets/plugins/apexcharts/dist/apexcharts.min.js')}}"></script>
	<script src="{{url('assets/js/demo/dashboard.demo.js')}}"></script> --}}
	<!-- ================== END page-js ================== -->

	<script>
		$(document).ready(function () {
			if (!$.browser.webkit) {
				$('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
			}
		});
		$(document).on('click', '#logout_btn', function () {
			loader();
			messaging.getToken({
                vapidKey: 'BElaslGmmOMctUgh05FA4zQ0Jqd8Cu6o4cQOrTkfoWsEe9XRLN1HhqwJ1yMEc1v8lcJAWhrCR2BCMWHB1XQI0-M'
            }).then((currentToken) => {
				messaging.deleteToken(currentToken).then(() => {
					console.log('Token deleted.');
					setTokenSentToServer(false);
					window.location.replace("{{route('delivery_boy.logout')}}");
					// Once token is deleted update UI.
				}).catch((err) => {
					console.log('Unable to delete token. ', err);
					window.location.replace("{{route('delivery_boy.logout')}}");
				});
			}).catch((err) => {
				console.log('Error retrieving registration token. ', err);
				showToken('Error retrieving registration token. ', err);
				window.location.replace("{{route('delivery_boy.logout')}}");
			});
		});

		function loader() {
			Swal.fire({
				allowOutsideClick: false,
				showConfirmButton: false,
				willOpen: () => {
					Swal.showLoading()
				},
			});
		}

		function alertMsg(title, icon) {
			Swal.fire({
				icon: icon,
				title: title,
				showConfirmButton: false,
				timer: 1500
			})
		}
	</script>
	@stack('js')
</body>

</html>