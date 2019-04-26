<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>GamePlay Admin</title>
	</head>
	<body>
		<?php echo $header; ?>

		<h1 class="text-center"> GamePlay <br> Content Management System </h1>

		<div class="container-fluid" >
			<form align="right" style="margin-top:5px;margin-bottom:5px;" action="Admin_Insert" method="POST">
				<input type="submit" name="Insert" value="Insert Product" class="btn btn-primary">
			</form>

			<table id="myTable" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<th class="text-center">ID</th>
					<th class="text-center">Product Name</th>
					<th class="text-center">Picture</th>
					<th class="text-center">Description</th>
					<th class="text-center">Developer</th>
					<th class="text-center">Genre</th>
					<th class="text-center">Price</th>
					<th class="text-center">Stock</th>
					<th class="text-center">Action</th>
				</thead>
				<tbody>
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

							echo "<tr>";
								echo "<td class='text-center' style='vertical-align:middle;'>" . $product_id . "</td>";
								echo "<td class='text-center' style='vertical-align:middle;'>" . $product_name . "</td>";

								echo "<td ><img style=\"max-width: 100px;\" src='" . $product_pict . "'></td>";

								if(strlen($product_desc) > 100){
									echo "<td class='text-center'  style='vertical-align:middle;'>" . substr($product_desc, 0, 100) . "...</td>";
								}
								else {
									echo "<td class='text-center'  style='vertical-align:middle;'>" . $product_desc . "</td>";
								}

								echo "<td class='text-center'  style='vertical-align:middle;'>" . $product_dev . "</td>";

								echo "<td class='text-center'  style='vertical-align:middle;'>";

								for($i=0; $i < sizeof($genreID); $i++){
									if($genreID[$i] == 1){
										echo "Action";
									}
									else if($genreID[$i] == 2){
										echo "Adventure";
									}
									else if($genreID[$i] == 3){
										echo "Music";
									}

									if(!($i == sizeof($genreID)-1)){
										echo ", ";
									}
								}

								echo "</td>";

								echo "<td class='text-center' style='vertical-align:middle;'>Rp. " . number_format($product_price,2) . "</td>";
								echo "<td class='text-center' style='vertical-align:middle;'>" . $product_stock . "</td>";
								echo "<td style=\"vertical-align:middle\";>";
									echo "<form action=\"Admin_Update?product_id=" . $product_id . "\" method=\"POST\">";
											echo "<input type=\"submit\" name=\"Update\" value=\"Update Product\" class=\"btn btn-warning\">";
									echo "</form><br>";
								echo "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
				<tfoot>
					<th class="text-center">ID</th>
					<th class="text-center">Product Name</th>
					<th class="text-center">Picture</th>
					<th class="text-center">Description</th>
					<th class="text-center">Developer</th>
					<th class="text-center">Genre</th>
					<th class="text-center">Price</th>
					<th class="text-center">Stock</th>
					<th class="text-center">Action</th>
				</tfoot>
			</table>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#myTable').DataTable();
			});
		</script>
	</body>
</html>
