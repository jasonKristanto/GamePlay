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

				echo "<div style='border-style:groove; background-color:lightgrey;width: 25rem;'>";
					 echo "<h4 class='text-center'>" . $product_name . "</h4>";
					 echo "<div align=\"center\" style=\"margin: auto;\">";
						echo "<img style=\"width: 150px;\" src=" . $product_pict . ">";
					 echo "</div>";
					 echo "<h5 class='text-center'>Rp. " . number_format($product_price,2) . "</h5>";
					 echo "<div class=\"form-group row\">";
						echo "<div align=\"center\">";
							echo "<a href=\"Detail?id=" . $product_id . "\"><button style=\"margin:2px;\" class=\"btn btn-primary\">Detail</button></a>";
							echo "<a href=\"\"><button style=\"margin:2px;\" class='btn btn-primary'><span class='glyphicon glyphicon-shopping-cart'></span></button></a>";
							echo "<a href=\"\"><button style=\"margin:2px;\" class='btn btn-primary'><span class='glyphicon glyphicon-heart'></span></button></a>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
				echo "<br>";
			}
		?>

		<div class="card" style="width: 18rem;">
		  <img class="card-img-top" src="..." alt="Card image cap">
		  <div class="card-body">
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>

		<script type="text/javascript">

		</script>
	</body>
</html>
