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

		<div  class="row">
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

				<h4 class="text-center"> Released: <br> <?php echo $product[0]['price']; ?></h4>
				<h4 class="text-center"> Director: <br> <?php echo $product[0]['developer']; ?></h4>

				<div align="center" style="margin: auto; width: 50%;"><a href="<?php echo base_url(); ?>"><button class="btn btn-primary">Back</button></a></div>
			</div>
		</div>	

		<?php echo $footer; ?>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#myTable').DataTable();
			});
		</script>
	</body>
</html>
