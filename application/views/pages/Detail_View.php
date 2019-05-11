<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title><?php echo $product[0]['productName']; ?></title>
	</head>
	<body>
		<?php echo $header; ?>

		<div class="row">
			<div class="col-4">
				<?php
					$product_pict = base_url('assets/pict_product/') . $product[0]['picture'];
				?>
				<div align="center" style="margin: auto; width: 300px;">
					<img style="width: 50%;" src="<?php echo $product_pict; ?>">
				</div>
			</div>
			<div class="col-8">
				<h2 class="text-center"><?php echo $product[0]['productName']; ?></h2>
				<h4 class="text-center"> Price    : <br> Rp. <?php echo number_format($product[0]['price'],2); ?></h4>
			</div>
		</div>

		<div class="box-body">
			<form class="form-group" method="POST" action="Detail/detail" >
				<div class="form-group">
						<input type="hidden" class="form-control" name="detail_ID" value=" <?php echo $product[0]['ID']; ?>">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"></label>
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

		<?php echo $footer; ?>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#myTable').DataTable();
			});
		</script>
	</body>
</html>
