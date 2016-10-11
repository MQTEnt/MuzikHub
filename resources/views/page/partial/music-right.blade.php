<section id="rank">
	<h2>Bảng xếp hạng âm nhạc</h2>
	<div class="container-fluid">
		<div class="row">
			<div class="btn-group btn-group-justified">
				<a href="#" class="btn btn-primary tab-rank">Việt Nam</a>
				<a href="#" class="btn btn-primary tab-rank">US/UK</a>
				<a href="#" class="btn btn-primary tab-rank">Hàn Quốc</a>
			</div>
		</div>
		<div id="content-rank" class="row">
			<div class="row">
				<div class="col-sm-10 row-rank">
					<img src="/imgs/ChungTaKhongThuocVeNhau.jpg" alt="" class="single-picture">
					<p>Lorem ipsum dolor sit amet.</p>
					<p>Lorem ipsum dolor.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 row-rank">
					<img src="/imgs/BuongDoiTayNhauRa.jpg" alt="" class="single-picture">
					<p>Lorem ipsum dolor sit amet.</p>
					<p>Lorem ipsum dolor.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 row-rank">
					<img src="/imgs/EmCuaNgayHomQua.jpg" alt="" class="single-picture">
					<p>Lorem ipsum dolor sit amet.</p>
					<p>Lorem ipsum dolor.</p>
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
	<h2>Ca sĩ nổi bật</h2>
</div>
<!-- End #list-aritst -->
