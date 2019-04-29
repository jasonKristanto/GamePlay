<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>Insert Product</title>
	</head>
	<body>
		<?php echo $header; ?>

		<h1 class="text-center"> Insert New Product </h1> <br>

		<form class="form-group" method="POST" action="Admin_Insert/insert_action" enctype='multipart/form-data'>
			<div class="form-group">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="insert_nama">Product Name</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="insert_nama" placeholder="Product Name">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="insert_desc">Description</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="insert_desc" placeholder="Description">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="insert_desc">Developer</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="insert_dev" placeholder="Developer">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="insert_genre">Genre</label>
				    <div class="col-sm-4" style="width:50%;">
				    	<?php
					      	foreach ($genre as $row) {
					      		echo "<input type=\"checkbox\" name=\"insert_genre[]\" value=\"" . $row['genre'] . "\">" . ucwords($row['genre']) . "<br>";
					      	}
				    	?>
				    </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="insert_stock">Stock</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="number" class="form-control" name="insert_stock" placeholder="Stock">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="insert_price">Price</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="number" class="form-control" name="insert_price" placeholder="Price">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<label for="insert_file" class="col-sm-2 col-form-label">Product Image</label>
					<div class="col-sm-4" style="width:50%;">
						<input type="file" class="form-control-file" name="insert_file">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-4" align="right" style="width: 50%;">
						<input class="btn btn-primary" type="submit" name="Submit" value="Submit">
						<input class="btn btn-danger" type="submit" name="Cancel" value="Cancel">
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
