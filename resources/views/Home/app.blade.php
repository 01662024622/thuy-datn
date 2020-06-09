<!DOCTYPE html>
<html lang="en">
<head>
	<title>Audio Online</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Symphony Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->

<link rel="stylesheet" href="{{ asset ('theme/home/css/bootstrap.css') }}" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset ('theme/home/css/style.css') }}" type="text/css" media="all">
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> -->
	<!-- js -->
	<script src=" {{ asset ('theme/home/js/jquery-2.1.4.min.js') }}" type="text/javascript"></script>
	<!-- <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script> -->
	<!-- //js -->
	<!-- font-awesome-icons -->
	<link rel="stylesheet" href="{{ asset ('theme/home/css/font-awesome.css') }}">
	<!-- <link href="css/font-awesome.css" rel="stylesheet">  -->
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Sofia" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">

	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
	<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>


<body>
	<!-- banner -->
	@yield('css')
	@yield('header')
	@yield('navigation')
	@yield('content')	

	<!-- //latest-albums -->
	<!-- footer -->
	<div class="footer">
		@include('home.footer')
	</div>
	<!-- //footer -->

	<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Symphony
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-6 w3_modal_body_left">
							<img src="images/15.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-6 w3_modal_body_right">
							<h4>Suspendisse et sapien ac diam suscipit posuere</h4>
							<p>Ut enim ad minima veniam, quis nostrum 
								exercitationem ullam corporis suscipit laboriosam, 
								nisi ut aliquid ex ea commodi consequatur? Quis autem 
								vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.
								<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i>
								Fusce in ex eget ligula tempor placerat. Aliquam laoreet mi id felis commodo 
								interdum. Integer sollicitudin risus sed risus rutrum 
							elementum ac ac purus.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- //bootstrap-pop-up -->
	<!-- flexisel -->
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: false,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems:2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 2
					}
				}
			});

		});
	</script>

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
	<!-- <script type="text/javascript" src="js/jquery.flexisel.js"></script> -->
	<script src=" {{ asset ('theme/home/js/jquery.flexisel.js') }}" type="text/javascript"></script>
	<!-- //flexisel -->
	<!-- start-smooth-scrolling -->
	<script src=" {{ asset ('theme/home/js/move-top.js') }}" type="text/javascript"></script>
	<script src=" {{ asset ('theme/home/js/easing.js') }}" type="text/javascript"></script>


<!-- <script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script> -->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- start-smooth-scrolling -->
	<!-- for bootstrap working -->
	<!-- <script src="js/bootstrap.js"></script> -->
	<script src=" {{ asset ('theme/home/js/bootstrap.js') }}" type="text/javascript"></script>
	<!-- //for bootstrap working -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/

				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>

		@yield('script')
		<!-- //here ends scrolling icon -->
	</body>
	</html>