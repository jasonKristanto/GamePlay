<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>Update Product</title>
	</head>
	<body>
		<?php
			echo $header;
			$genreID = explode(";", $product[0]['genreID']);
		?>

		<form class="form-group" method="POST" action="Admin_Update/update_action?id=<?php echo $product[0]['ID']; ?>" enctype="multipart/form-data">
			<div class="form-group">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="update_id">Product ID</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="update_id" value="<?php echo $product[0]['ID']; ?>" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="update_nama">Product Name</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="update_nama" value="<?php echo $product[0]['productName']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="update_desc">Description</label>
				    <div class="col-sm-4" style="width:50%;">
						<input type="text" class="form-control" name="update_desc" value="<?php echo $product[0]['description']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="update_dev">Developer</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="update_dev" value="<?php echo $product[0]['developer']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="update_genre">Genre</label>
				    <div class="col-sm-4" style="width:50%;">
				    	<?php
					      	foreach ($genre as $row) {
					      		$cek = 0;
					      		for($i=0; $i < sizeof($genreID); $i++){
					      			if($genreID[$i] == $row['ID']){
					      				echo "<input type=\"checkbox\" name=\"update_genre[]\" value=\"" . $row['genre'] . "\" checked>" . ucwords($row['genre']) . "<br>";
					      				$cek = 1;
					      				break;
					      			}
					      		}
					      		if($cek == 0){
					      			echo "<input type=\"checkbox\" name=\"update_genre[]\" value=\"" . $row['genre'] . "\">" . ucwords($row['genre']) . "<br>";
					      		}
					      	}
				    	?>
				    </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="update_stock">Stock</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="number" class="form-control" name="update_stock" value="<?php echo $product[0]['stock']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="update_price">Price</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="number" class="form-control" name="update_price" value="<?php echo $product[0]['price']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<label for="poster" class="col-sm-2 col-form-label">Current Poster</label>
					<div class="col-sm-4" style="width:50%;">
						<img style="width: 20%;" src="<?php echo base_url('assets/pict_product/') . $product[0]['picture']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<label for="update_file" class="col-sm-2 col-form-label">Product Image</label>
					<div class="col-sm-4" style="width:50%;">
						<input type="file" class="form-control-file" name="update_file">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-4" align="right" style="width: 50%;">
						<input class="btn btn-primary" type="submit" name="Update" value="Update">
						<input class="btn btn-danger" type="submit" name="Cancel" value="Cancel">
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
