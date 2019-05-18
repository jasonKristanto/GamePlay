<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<div class="carousel-inner">
		<?php
			$idx = 0;
			foreach ($product as $row) {
				$product_id = $row['ID'];
				$product_name = $row['productName'];
				$product_pict = base_url('assets/pict_product/') . $row['picture'];
				$product_stock = $row['stock'];
				$product_price = $row['price'];
				$product_desc = $row['description'];
				$product_dev = $row['developer'];
				$genreID = explode(";", $row['genreID']);

				if($idx == 0) echo "<div class='item active'";
				else echo "<div class='item'";
				echo "style=\"background-image: url('".$product_pict."')\">";

		?>

		<!-- <div class="item"> -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 col-md-4 col-md-offset-2">
						<h2 class="item-title"><?php echo $product_name; ?></h2>
						<small class="item-price">Rp. <?php echo number_format($product_price,2); ?></small>
						<p><?php echo $product_desc; ?></p>
							<?php if($product_stock > 0)  {?>
								<a href="<?php echo base_url() . "Detail?id=" . $product_id; ?>"><button style="margin:2px;" class="btn btn-primary">BUY NOW</button></a>
							<?php } ?>
							<?php if($product_stock <= 0)  {?>
								<a href=""><button style="margin:2px;" class="btn btn-danger" disabled>SOLD OUT</button></a>
							<?php } ?>
					</div>
					<div class="col-sm-6 col-md-4">
						<img src="<?php echo $product_pict; ?>" class="img-responsive center-block" style="min-height: 100%;">
					</div>
				</div>
			</div>
		</div>

		<?php
				if ($idx++ >= 2) break;
			}
		?>
	</div>

	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<style>
	.carousel-inner .container-fluid .row{
		margin: 50px 0 50px;
	}
	.carousel-inner > .item {
		background-size: cover;
		background-position: center;
		width: 100%;
		margin: auto;
		min-height:initial;
	}
	.carousel-inner > .item > .container-fluid{
		background: rgba(0,0,0,0.7);
		color: white;
	}
	.carousel-inner > .item .item-title {
		font-size: 3.5em;
		font-weight: 300;
		color: white;
		margin-bottom: 10px;
	}

	.carousel-inner > .item .item-price {
		font-size: 1.5em;
		color: #5FA4CC;
		margin-bottom: 30px;
		display: block;
	}

	.carousel-inner > .item  img{
		width: 100%;
		margin: auto;
		min-height:initial;
		border: 10px solid #F0F0F0;
		border-radius: 20px;
		max-width: 100%;
	}
</style>
