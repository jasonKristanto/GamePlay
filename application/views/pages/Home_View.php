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
								<img src="<?php echo $product_pict; ?>">
							</div>
							<div class="product-detail">
								<h3 class="product-title text-center" style="height:50px;"><?php echo $product_name; ?></h3>
								<small class="product-price text-center">Rp. <?php echo number_format($product_price,2); ?></small>
								<p class="product-desc">
									<?php
										if(strlen($product_desc) > 100) echo substr($product_desc, 0, 100)." ... ";
										else echo $product_desc;
									?>
								</p>
								<div align="center">
									<?php if($product_stock > 0)  {?>
										<a href="<?php echo base_url() . "Detail?id=" . $product_id; ?>"><button style="margin:2px;" class="btn btn-primary">BUY NOW</button></a>
									<?php } ?>
									<?php if($product_stock <= 0)  {?>
										<a href=""><button style="margin:2px;" class="btn btn-danger" disabled>SOLD OUT</button></a>
									<?php } ?>
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
		.product-img > img{
			width:100%;
			max-height:50%;
		}
		.product-detail{
			margin-bottom: 10px 0 20px;
		}

		a:link {
		  text-decoration: none;
		}

		a:visited {
		  text-decoration: none;
		}

		a:hover {
		  text-decoration: none;
		}

		a:active {
		  text-decoration: none;
		}

	</style>
	<script>
		<?php if(isset($_GET['success'])) {?>

		$.notify({
			'...' : '...'
		},{
			element: 'body',
			position: null,
			type: "success",
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: "top",
				align: "center"
			},
			offset: 20,
			spacing: 10,
			z_index: 1031,
			delay: 5000,
			timer: 1000,
			url_target: '_blank',
			mouse_over: null,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
				'<span data-notify="icon"></span> ' +
				'<span data-notify="title"><strong>Purchase Success.</strong></span> </br>' +
				'<span data-notify="message">Thank you for your puchases, enjoy your game.</span>' +
				'<div class="progress" data-notify="progressbar">' +
					'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
				'</div>' +
				'<a href="{3}" target="{4}" data-notify="url"></a>' +
			'</div>'
		});
		<?php }?>
	</script>
</html>
