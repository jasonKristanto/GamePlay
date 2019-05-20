<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title><?php echo "Cart"; ?></title>
	</head>
	<body class="bgGrey2">
		<?php echo $header; ?>
		<div class="container-fluid wrapper">
			<div class="card">
				<table id="myTable" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<th class="text-center">Picture</th>
								<th class="text-center">Product Name</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Price (dalam Rupiah)</th>
						<th class="text-center">Total (dalam Rupiah)</th>
						<th class="text-center">Action</th>
					</thead>
					<tbody>
						<?php
									$grand_total = 0;
						foreach ($product as $row) {
							$product_id = $row['ID'];
							$product_name = $row['productName'];
							$product_pict = base_url('assets/pict_product/') . $row['picture'];
							$product_qty = $row['qty'];
							$product_price = $row['price'];
							$product_stock = $row['stock'];

										$total = $product_qty * $product_price;

										$grand_total += $total;

							echo "<tr>";
											echo "<td class='text-center' style='vertical-align:middle;'><img style=\"max-width: 100px;\" src='" . $product_pict . "'></td>";
							echo "<td class='text-center' style='vertical-align:middle;'>" . $product_name . "</td>";
											echo "<td class='text-center' style='vertical-align:middle;'>";
												echo "<form class=\"form-group\" method=\"POST\" action=\"" . base_url() . "Cart/update_qty?id=" . $product_id . "\">";
													echo "<input type=\"number\" class=\"form-control\" name=\"cart_qty\" value=\"" . $product_qty . "\" min=1 max=" . $product_stock . ">";
													echo "<input type=\"submit\" name=\"Update\" value=\"Update\" class=\"btn btn-primary\">";
												echo "</form>";
											echo "</td>";
											echo "<td class='text-center' style='vertical-align:middle;'>" . number_format($product_price,2) . "</td>";
							echo "<td class='text-center' style='vertical-align:middle;'>" . number_format($total,2) . "</td>";

							echo "<td class='text-center' style=\"vertical-align:middle\";>";
												echo "<div class=\"form-group row\">";
								echo "<a href='" . base_url() . "Cart/remove?id=" . $product_id . "'><button class=\"btn btn-danger\">Remove</button></a>";
												echo "</div>";
							echo "</td>";
							echo "</tr>";
						}
						?>
					</tbody>
					<tfoot>
								<th class="text-center" style="vertical-align:middle;">Picture</th>
								<th class="text-center" style="vertical-align:middle;">Product Name</th>
						<th class="text-center" style="vertical-align:middle;">Quantity</th>
								<th class="text-center" style="vertical-align:middle;">Price</th>
						<th class="text-center" style="vertical-align:middle;">Total: Rp. <?php echo number_format($grand_total,2) ?></th>
						<th class="text-center" style="vertical-align:middle;">
								<?php if(sizeof($product) > 0) { ?>
									<a href="<?php echo base_url() . "Buy"; ?>"><button class="btn btn-success">Buy</button></a>
								<?php } ?>
							<?php if(sizeof($product) == 0) { ?>
									<a href="<?php echo base_url() . "Buy"; ?>"><button class="btn btn-success" disabled>Buy</button></a>
								<?php } ?>
								</th>
					</tfoot>
				</table>
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
			margin: 3% auto 3%;
			padding: 1%;
			background: #EEEEEE;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
			border-radius: 5px;
		}
		</style>
	</body>
</html>
