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
<link rel="stylesheet" href="/css/custom.css">
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
							<a style="cursor: pointer;" class="pull-right"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User</a>
						</div>
					</div>
				</div>
			</section>

			<div id="page-wrapper">
				<div class="inner-content single">
					<div class="tittle-head">
						<h3 class="tittle">{{$single->name}}</h3>
						<div class="clearfix"> </div>
					</div>
					<!-- Single_left -->
					<div class="single_left">
						<div class="info">
							<p>Singer: {{$single->singer}}</p>
							<p>Composer: {{$single->composer}}</p>
							<p>Category: {{$single->cate}}</p>
						</div>
						<div class="img-single">
							<img width="150px" height="150px" src="{{$img->path}}" alt="" id="imgContent">
						</div>
						<div class="audio-player">
							<audio controls>
								<source src="{{$audio->path}}" type="audio/mpeg">
							</audio>
						</div>
						<div class="group-btn">
							<div class="row">
								<div class="col-sm-3 btn-single">
									<a id="btnLike" style="cursor: pointer; text-decoration: none;"><span class="glyphicon glyphicon-thumbs-up"></span><span> Like</a> </span><span id="countLike" class="badge">{{$single->like}}</span>
								</div>
								<div class="col-sm-5 btn-single">
									<a id="btnDownload" href="{{$audio->path}}" style="cursor: pointer; text-decoration: none;" download><span class="glyphicon glyphicon-download-alt"></span><span> Download</a> </span><span id="countDownload" class="badge">{{$single->download}}</span>
								</div>
								<div class="col-sm-3 btn-single">
									<a id="btnLyric" style="cursor: pointer; text-decoration: none;"><span class="glyphicon glyphicon-align-left"></span><span> Lyric</a></span>
								</div>
							</div>
						</div>
						<div class="lyric">
							<p>{{$single->lyric}}</p>
						</div>
					</div>
					<!-- End .single_left -->
					<div class="response">
						<div class="media response-info">
							<!-- user comment -->
							@if(isset($comments))
								@foreach($comments as $item)
								<div class="media-left response-text-left">
									<a href="#"><img width="50px" height="50px" class="media-object" src="/imgs/user-icon.png" alt=""></a>
									<h5><a href="#">Username</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>{{$item->content}}</p>
									<ul>
										<?php $dateComment = explode(" ", $item->created_at)[0]; ?>
										<li>{{$dateComment}}</li>
									</ul>
								</div>
								<div class="clearfix"></div>
								@endforeach
							@endif
						</div>
					</div>
					<div class="clearfix"></div>
					<!-- Your comment -->
					<div class="coment-form">
						<h4>Leave your comment</h4>
						<form id="formComment" action="#" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<textarea id="txtComment" placeholder="Write something..."></textarea>
							<input id="btnSubmitComment" type="submit" value="Submit Comment">
						</form>
					</div>
					<!-- End Your comment -->
				</div>
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
	<script>
		$(document).ready(function(){
			$('.lyric').hide();
			//Click button Lyric
			$('#btnLyric').click(function(){
				$('.lyric').toggle();
			});
			//click button Like
			var clickLike = true;
			$('#btnLike').click(function(){
				if(clickLike)
				{
					var count = parseInt($('#countLike').text());
					$('#countLike').text(++count);
					$.get("/single/"+{{$single->id}}+"/like", function(data, status){
       					 console.log(data);
   					});
					clickLike = false;
				}
				else{
					alert('You just liked this song');
				}
			});
			//click button Download
			var clickDownload = true;
			$('#btnDownload').click(function(){
				if(clickDownload)
				{
					var count = parseInt($('#countDownload').text());
					$('#countDownload').text(++count);
					$.get("/single/"+{{$single->id}}+"/download", function(data, status){
       					 console.log(data);
   					});
					clickDownload = false;
				}
				else{
					
				}
			});
			//click submit comment
			$('#btnSubmitComment').click(function(){
				var token = $("input[name='_token']").val();
				var comment = $('#txtComment').val();
				//Date comment
				var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var date = d.getFullYear() + '-' +(month<10 ? '0' : '') + month + '-' +(day<10 ? '0' : '') + day;
				//
				if(comment.length < 10){
					alert('The content must be at least 10 characters');
					return 0;
				}
				var dataRequest = { 'content': comment, song_id: {{$single->id}}, '_token': token };
				console.log(dataRequest);
				$.post('/single/'+{{$single->id}}+'/comment', dataRequest)
				.done(function( data ) {
					console.log( "Data response: " + data );
					var divComment = '<div class="media-left response-text-left">';
					divComment += '<a href="#"><img width="50px" height="50px" class="media-object" src="/imgs/user-icon.png" alt=""></a>';
					divComment += '<h5><a href="#">Username</a></h5>';				
					divComment += '</div>';
					divComment += '<div class="media-body response-text-right"><p>'+comment+'</p><ul><li>'+date+'</li></ul>';
					divComment += '</div><div class="clearfix"></div>';
					$('.media').prepend(divComment);

					$('#txtComment').val("");
				});
			});
			//Prevent Submit
			$("#formComment").submit(function(e){
    			return false;
			});
		});
	</script>
</body>
</html>