<!--banner-section-->
<div class="banner-section">
	<div class="banner">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="banner-img">
						<img src="/imgs/11.jpg" class="img-responsive" alt="">
					</div>
					<div class="banner-info">
						<!-- <h3>Let Your Home</h3>
						<p>Album by <span>Rock star</span></p> -->
					</div>
				</li>
				<li>
					<div class="banner-img">
						<img src="/imgs/22.jpg" class="img-responsive" alt="">
					</div>
					<div class="banner-info">
						<!-- <h3>Charis Brown feet</h3>
						<p>Album by <span>Rock star</span></p> -->
					</div>
				</li>
			</ul>
		</div>
		<!--banner-->
		<script src="/js/responsiveslides.min.js"></script>
		<script>
			// You can also use "$(window).load(function() {"
			$(function (){
			// Slideshow 4
			$("#slider4").responsiveSlides({
					auto: true,
					pager:true,
					nav:true,
					speed: 500,
					namespace: "callbacks",
					before: function () {
						$('.events').append("<li>before event fired.</li>");
					},
					after: function () {
						$('.events').append("<li>after event fired.</li>");
					}
				});
			});
		</script>
	<div class="clearfix"></div>
	</div>
</div>	
<!-- End banner-section -->
<!--albums-->
<!-- pop-up-box --> 
<link href="/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
<script src="/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$('.popup-with-zoom-anim').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});
});
</script>		
<!--//pop-up-box -->
<div class="albums">
	<div class="tittle-head">
		<h3 class="tittle">Discover <span class="new">View</span></h3>
		<a href="index.html"><h4 class="tittle two">See all</h4></a>
		<div class="clearfix"> </div>
	</div>
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="/imgs/v1.jpg" title="allbum-name"></a>
		<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Listen now</a>
	</div>
	<div id="small-dialog" class="mfp-hide">
		<!-- <iframe src="https://player.vimeo.com/video/12985622"></iframe>-->
	</div>
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="/imgs/v2.jpg" title="allbum-name"></a>

		<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Listen now</a>
	</div>
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="/imgs/v3.jpg" title="allbum-name"></a>

		<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Listen now</a>
	</div>
	<div class="col-md-3 content-grid last-grid">
		<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="/imgs/v4.jpg" title="allbum-name"></a>

		<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Listen now</a>
	</div>
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="/imgs/v5.jpg" title="allbum-name"></a>

		<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Listen now</a>
	</div>
	<div id="small-dialog" class="mfp-hide">
		<!-- <iframe src="https://player.vimeo.com/video/12985622"></iframe> -->

	</div>
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="/imgs/v6.jpg" title="allbum-name"></a>

		<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Listen now</a>
	</div>
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="/imgs/v7.jpg" title="allbum-name"></a>

		<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Listen now</a>
	</div>
	<div class="col-md-3 content-grid last-grid">
		<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="/imgs/v8.jpg" title="allbum-name"></a>
		<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Listen now</a>
	</div>
	<div class="clearfix"> </div>
</div>
<!--End albums-->
<div class="albums second">
	<div class="tittle-head">
		<h3 class="tittle">Discover <span class="new">View</span></h3>
		<a href="index.html"><h4 class="tittle two">See all</h4></a>
		<div class="clearfix"> </div>
	</div>
	<div class="col-md-3 content-grid">
		<a href="single.html"><img src="/imgs/v11.jpg" title="allbum-name"></a>
		<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
	</div>
	<div class="col-md-3 content-grid">
		<a href="single.html"><img src="/imgs/v22.jpg" title="allbum-name"></a>
		<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
	</div>
	<div class="col-md-3 content-grid">
		<a href="single.html"><img src="/imgs/v33.jpg" title="allbum-name"></a>
		<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
	</div>
	<div class="col-md-3 content-grid last-grid">
		<a href="single.html"><img src="/imgs/v44.jpg" title="allbum-name"></a>
		<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
	</div>
	<div class="col-md-3 content-grid">
		<a href="single.html"><img src="/imgs/v55.jpg" title="allbum-name"></a>
		<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
	</div>
	<div class="col-md-3 content-grid">
		<a href="single.html"><img src="/imgs/v66.jpg" title="allbum-name"></a>
		<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
	</div>
	<div class="col-md-3 content-grid">
		<a href="single.html"><img src="/imgs/v11.jpg" title="allbum-name"></a>
		<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
	</div>
	<div class="col-md-3 content-grid last-grid">
		<a href="single.html"><img src="/imgs/v22.jpg" title="allbum-name"></a>
		<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
	</div>
	<div class="clearfix"></div>
</div>
<!-- End albums second -->
