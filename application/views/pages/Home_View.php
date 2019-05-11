<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $css;
			echo $js;
		?>

		<title>GamePlay</title>
	</head>
	<body>
		<?php echo $header; ?>

		<div class='container-fluid row'style="margin:0px;margin:auto;">
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

 				echo "<div class='col-md-4' style='border-style:groove; background-color:lightgrey;width:20%;margin:10px;'>";
					echo "<h4 class='text-center' style='height:38px;'>" . $product_name . "</h4>";
					 echo "<div align=\"center\" style=\"margin: auto;\">";
						echo "<img style=\"width: 150px;height:180px;\" src=" . $product_pict . ">";
					 echo "</div>";
					 echo "<h5 class='text-center'>Rp. " . number_format($product_price,2) . "</h5>";
					 echo "<div class=\"form-group row\">";
						echo "<div align=\"center\">";
							echo "<a href=\"" . base_url() . "Detail?id=" . $product_id . "\"><button style=\"margin:2px;\" class=\"btn btn-primary\">Detail</button></a>";
							echo "<a href=\"\"><button style=\"margin:2px;\" class='btn btn-primary'><span class='glyphicon glyphicon-heart'></span></button></a>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			}
		?>
		</div>
	</body>
</html>
