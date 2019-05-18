<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $css;
			echo $js;
		?>

		<title>GamePlay</title>
	</head>
	<body class="bgGrey2">
		<?php 
			echo $header; 
			if(isset($carousel)) echo $carousel;
		?>
		<section>
			<div class="container product-list">
				<div class="row">
					<?php
						foreach ($product as $row) {
							$product_id = $row['ID'];
							$product_name = $row['productName'];
							$product_pict = base_url('assets/pict_product/') . $row['picture'];
							$product_stock = $row['stock'];
							$product_price = $row['price'];
							$product_desc = $row['description'];
							$product_dev = $row['developer'];
							$genreID = explode(";", $row['genreID']);
							$productLink = base_url() . "Detail?id=" . $product_id;
					?>
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="product">
							<div class="product-img">
								<a href="<?php echo $productLink; ?>"><img src="<?php echo $product_pict; ?>"></a>
							</div>
							<div class="product-detail">
								<h3 class="product-title"><?php echo $product_name; ?></h3>
								<small class="product-price">Rp. <?php echo number_format($product_price,2); ?></small>
								<p class="product-desc">
									<?php 
										if(strlen($product_desc) > 100) echo substr($product_desc, 0, 100)." ... "; 
										else echo $product_desc;
									?>
								</p>
								<div align="center">
									<a href="<?php echo base_url() . "Detail?id=" . $product_id; ?>"><button style="margin:2px;" class="btn btn-primary">Detail</button></a>
									<a href=""><button style="margin:2px;" class='btn btn-primary'><span class='glyphicon glyphicon-heart'></span></button></a>
								</div>
							</div>
						</div>
					</div>
						
					<?php } ?>

				</div>
			</div>
		</section>
	</body>
	<style>
		.section-title {
			margin-bottom: 70px;
			text-align: center;
		}
		.product-list .row {
			margin: 5% 0;
		}
		.product-list .row {
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display:         flex;
			flex-wrap: wrap;
		}
		.product-list .row > [class*='col-'] {
			display: flex;
			flex-direction: column;
		}

		.product {
			background: #EEEEEE;
			padding: 30px;
			border-radius: 3px;
			box-sizing: border-box;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
			margin: 0 0 50px;
		} 

		.product .product-title{
			font-size: 1.5em;
			margin-bottom: 5px;
			display: block;
		} 

		.product .product-price{
			font-size: 1em;
			color: #5FA4CC;
			margin-bottom: 10px;
			display: block;
		} 
		.product-img > a > img{
			width:100%;
			max-height:50%;
		}
		.product-detail{
			margin-bottom: 10px 0 20px;
		}
		
	</style>
</html>
