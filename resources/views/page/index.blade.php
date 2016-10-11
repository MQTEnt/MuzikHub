<!DOCTYPE HTML>
<html>
<head>
<title>MuzikHub</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> 
	addEventListener("load", function()
	{ 
		setTimeout(hideURLbar, 0);
	}, false); 
	function hideURLbar(){ window.scrollTo(0,1); }
</script>

 <!-- Bootstrap Core CSS -->
<link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="/css/font-awesome.min.css" rel="stylesheet"> 
<!-- lined-icons -->
<link rel="stylesheet" href="/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- Custom CSS -->
<link rel="stylesheet" href="/css/custom-page.css">
 <!-- Meters graphs -->
 <!-- jQuery -->
<script src="/js/jquery-1.10.2.min.js"></script>
</head> 
<body class="sticky-header left-side-collapsed">
    <section>
    	<div class="left-side sticky-left-side">
    		@include('page.partial.left-side')
    	</div><!-- End left side start -->
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			@include('page.partial.app')
		</div><!-- End app -->
		<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			@include('page.partial.signup')
		</div><!-- End signup -->

		<!-- main content start-->
		<div class="main-content">
			<section class="nav">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 hidden-xs">
							<a class="toggle-btn menu-collapsed btn btn-custom" href="#">
								<span class="fa fa-bars"></span> Menu
							</a>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" class="form-control"/>
								<span class="input-group-addon">
									<i class="fa fa-search"></i>
								</span>
							</div>
						</div>
						<div class="col-md-4">
							<a class="pull-right">Login</a>
						</div>
					</div>
				</div>
			</section>

			<div id="page-wrapper">
				<div class="inner-content">
					<div class="music-left">
						@include('page.partial.music-left')
					</div><!-- End music-left -->
					<div class="music-right">
						@include('page.partial.music-right')
					</div><!-- End music-right -->
					<div class="clearfix"></div>
				</div> <!-- End inner-content -->
				<div class="review-slider">
					@include('page.partial.review-slider')
				</div> <!-- End review-slider -->
			</div>
			<div class="clearfix"></div>
		</div> <!-- End main-content -->
		<div class="footer">
		</div>
        <!--footer section start-->
        <!-- <footer></footer> -->
   	</section>
	<script src="/js/jquery.nicescroll.js"></script>
	<script src="/js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="/js/bootstrap.min.js"></script>
</body>
</html>