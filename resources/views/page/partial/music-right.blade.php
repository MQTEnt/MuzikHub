<section id="rank">
	<h2>Charts</h2>
	<div class="container-fluid">
		<div class="row">
			<div class="btn-group btn-group-justified">
				<a href="#" class="btn btn-primary tab-rank">Việt Nam</a>
				<a href="#" class="btn btn-primary tab-rank">US/UK</a>
				<a href="#" class="btn btn-primary tab-rank">Korea</a>
			</div>
		</div>
		<div id="content-rank" class="row">
			<div class="row">
				<div class="col-sm-10 row-rank">
					<img src="/imgs/ChungTaKhongThuocVeNhau.jpg" alt="" class="single-picture">
					<p>Chúng ta không thuộc về nhau</p>
					<p>Sơn Tùng M-TP</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 row-rank">
					<img src="/imgs/BuongDoiTayNhauRa.jpg" alt="" class="single-picture">
					<p>Buông đôi tay nhau ra</p>
					<p>Sơn Tùng M-TP</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 row-rank">
					<img src="/imgs/EmCuaNgayHomQua.jpg" alt="" class="single-picture">
					<p>Em của ngày hôm qua</p>
					<p>Sơn Tùng M-TP</p>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function(){
		$('.tab-rank').click(function(){
			$('.row-rank').each(function(){
				$(this).toggle(1000);
			});
		});
	})
</script>
<!-- End #rank -->
<div id="list-artist">
	<h2>Hot singers</h2>
	<div class="hot-singers" class="row">
			<div class="row">
				<div class="col-sm-10">
					<img src="/imgs/ChungTaKhongThuocVeNhau.jpg" alt="" class="single-picture">
					<p>Sơn Tùng M-TP</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10">
					<img src="/imgs/img2.jpg" alt="" class="single-picture">
					<p>Charlie Puth</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10">
					<img src="/imgs/GD.jpg" alt="" class="single-picture">
					<p>G-Dragon</p>
				</div>
			</div>
		</div>
</div>
<!-- End #list-aritst -->
