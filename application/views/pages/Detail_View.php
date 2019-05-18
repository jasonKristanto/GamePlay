<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title><?php echo $product[0]['productName']; ?></title>
	</head>
	<body class="bgGrey2">
		<?php echo $header; ?>
		<div class="container wrapper">
			<div class="card">

				<div class="row">
					<div class="col-md-6">
					<?php $product_pict = base_url('assets/pict_product/') . $product[0]['picture'];?>
						<div align="center">
							<img src="<?php echo $product_pict; ?>" class="img-responsive center-block" style="min-height: 100%;">
						</div>
					</div>

					<div class="col-md-6">
						<div class="item-detail">
							<h2 class="item-title"><?php echo $product[0]['productName']; ?></h2>
							<h4 class="item-price">Rp. <?php echo number_format($product[0]['price'],2); ?></h4>
							<p class="item-desc"><?php echo $product[0]['description']; ?></p>
						</div>
						<form class="form-group" method="POST" action="Detail/detail" >
							<div class="form-group">
									<input type="hidden" class="form-control" name="detail_ID" value=" <?php echo $product[0]['ID']; ?>">
									<div class="form-group row">
										<label class="col-sm-2"></label>
										<label class="col-sm-2 col-form-label" for="detail_qty">Stock</label>
										<div class="col-sm-4" style="width:50%;">
											<input type="number" class="form-control" name="detail_qty" value="1" placeholder="Quantity" min="1">
										</div>
									</div>

									<div class="form-group row">
										<div class="col" align="center" >
											<input class="btn btn-success" type="submit" name="Buy" value="Buy">
											<input class="btn btn-primary" type="submit" name="Cart" value="Add To Cart">
											<input class="btn btn-danger" type="submit" name="Cancel" value="Back to Home">
										</div>
									</div>
							</div>
						</form>
					</div>

				
					<!-- <div class="col-md-7">
						<h2 class="text-center"><?php echo $product[0]['productName']; ?></h2>
						<h4 class="item-price">Rp. <?php echo number_format($product[0]['price'],2); ?></h4>
						
					</div> -->
				</div>

				
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#myTable').DataTable();
			});
		</script>
		<style>
			.wrapper{
				min-height: 90%; 
				min-height: 90vh; 
				display: flex;
				align-items: center;
			}
			.card {
				float: auto;
				margin: 0 auto 0;
				padding: 2%;
				width: 100%;
				background: #EEEEEE;
				box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
				border-radius: 5px;
			} 

			.card .item-detail {
				margin-bottom: 45px;
			}

			.card .item-title {
				font-size: 3.5em;
				font-weight: 300;
				color: black;
				margin-bottom: 10px;
			}

			.card .item-price {
				font-size: 1.5em;
				color: #5FA4CC;
				margin-bottom: 15px;
				display: block;
			}

			.card .item-desc {
				font-size: 1.em;
				color: #black;
				margin-bottom: 10px;
				display: block;
			}

			.card img{
				width: 100%;
				margin: auto;
				min-height:initial;
				border: 10px solid #F0F0F0;
				border-radius: 20px;
				max-width: 100%;
			}
		</style>
	</body>
</html>
