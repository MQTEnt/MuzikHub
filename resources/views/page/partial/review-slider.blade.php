<div class="tittle-head">
	<h3 class="tittle">Featured Albums <span class="new"> New</span></h3>
	<div class="clearfix"> </div>
</div>
<ul id="flexiselDemo1">
	<li>
		<a href="single.html"><img src="/imgs/v1.jpg" alt=""/></a>
		<div class="slide-title"><h4>Adele21 </div>
		<div class="date-city">
			<h5>Jan-02-16</h5>
			<div class="buy-tickets">
				<a href="single.html">READ MORE</a>
			</div>
		</div>
	</li>
	<li>
		<a href="single.html"><img src="/imgs/v2.jpg" alt=""/></a>
		<div class="slide-title"><h4>Adele21</h4></div>
		<div class="date-city">
			<h5>Jan-02-16</h5>
			<div class="buy-tickets">
				<a href="single.html">READ MORE</a>
			</div>
		</div>
	</li>
	<li>
		<a href="single.html"><img src="/imgs/v3.jpg" alt=""/></a>
		<div class="slide-title"><h4>Shomlock</h4></div>
		<div class="date-city">
			<h5>Jan-02-16</h5>
			<div class="buy-tickets">
				<a href="single.html">READ MORE</a>
			</div>
		</div>
	</li>
	<li>
		<a href="single.html"><img src="/imgs/v4.jpg" alt=""/></a>
		<div class="slide-title"><h4>Stuck on a feeling</h4></div>
		<div class="date-city">
			<h5>Jan-02-16</h5>
			<div class="buy-tickets">
				<a href="single.html">READ MORE</a>
			</div>
		</div>
	</li>
	<li>
		<a href="single.html"><img src="/imgs/v5.jpg" alt=""/></a>
		<div class="slide-title"><h4>Ricky Martine </h4></div>
		<div class="date-city">
			<h5>Jan-02-16</h5>
			<div class="buy-tickets">
				<a href="single.html">READ MORE</a>
			</div>
		</div>
	</li>
	<li>
		<a href="single.html"><img src="/imgs/v6.jpg" alt=""/></a>
		<div class="slide-title"><h4>Ellie Goluding </h4></div>
		<div class="date-city">
			<h5>Jan-02-16</h5>
			<div class="buy-tickets">
				<a href="single.html">READ MORE</a>
			</div>
		</div>
	</li>
	<li>
		<a href="single.html"><img src="/imgs/v6.jpeg" alt=""/></a>
		<div class="slide-title"><h4>Fifty Shades </h4></div>
		<div class="date-city">
			<h5>Jan-02-16</h5>
			<div class="buy-tickets">
				<a href="single.html">READ MORE</a>
			</div>
		</div>
	</li>
</ul>
<script type="text/javascript">
$(window).load(function() {
	$("#flexiselDemo1").flexisel({
		visibleItems: 5,
		animationSpeed: 1000,
		autoPlay: true,
		autoPlaySpeed: 3000,    		
		pauseOnHover: false,
		enableResponsiveBreakpoints: true,
		responsiveBreakpoints: { 
			portrait: { 
				changePoint:480,
				visibleItems: 2
			}, 
			landscape: { 
				changePoint:640,
				visibleItems: 3
			},
			tablet: { 
				changePoint:800,
				visibleItems: 4
			}
		}
	});
});
</script>
<script type="text/javascript" src="/js/jquery.flexisel.js"></script>