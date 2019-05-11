<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title><?php echo "Cart"; ?></title>
	</head>
	<body>
		<?php echo $header; ?>

    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <th class="text-center">Picture</th>
				<th class="text-center">Product Name</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Price</th>
        <th class="text-center">Total</th>
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

						$total = $product_qty * $product_price;

						$grand_total += $total;

            echo "<tr>";
							echo "<td class='text-center' style='vertical-align:middle;'><img style=\"max-width: 100px;\" src='" . $product_pict . "'></td>";
              echo "<td class='text-center' style='vertical-align:middle;'>" . $product_name . "</td>";
							echo "<td class='text-center' style='vertical-align:middle;'>";
								echo "<form class=\"form-group\" method=\"POST\" action=\"Cart/update_qty?id=" . $product_id . "\">";
									echo "<input type=\"number\" class=\"form-control\" name=\"cart_qty\" value=\"" . $product_qty . "\" min=1>";
									echo "<input type=\"submit\" name=\"Update\" value=\"Update\" class=\"btn btn-primary\">";
								echo "</form>";
							echo "</td>";
							echo "<td class='text-center' style='vertical-align:middle;'>Rp. " . number_format($product_price,2) . "</td>";
              echo "<td class='text-center' style='vertical-align:middle;'>Rp. " . number_format($total,2) . "</td>";

              echo "<td class='text-center' style=\"vertical-align:middle\";>";
								echo "<div class=\"form-group row\">";
                  echo "<a href='Cart/remove?id=" . $product_id . "'><button class=\"btn btn-danger\">Remove</button></a>";
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
					<a href="<?php echo base_url() . "Buy"; ?>"><button class="btn btn-success">Buy</button></a>
				</th>
      </tfoot>
    </table>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#myTable').DataTable();
			});
		</script>
	</body>
</html>
