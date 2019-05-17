<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>Update Product</title>
	</head>
    <body class="bgGrey">
		<div id="wrapper">

			<?php
				echo $sidebar;
				echo $header;
			?>

			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Insert New Product</h3>
						</div>
						<div class="box-body">

							<?php
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
											<textarea id="summernote" class="form-control" name="update_desc"><?php echo $product[0]['description']; ?></textarea>
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
											<button href="#genreList" data-toggle="collapse" class="genre-toggle btn">Genre</button>
											<div class="collapse" id="genreList">
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
										<label for="poster" class="col-sm-2 col-form-label">Image Preview</label>
										<div class="col-sm-4" style="width:50%;">
											<img id="imgPreview" style="max-width: 100px;" src="<?php echo base_url('assets/pict_product/') . $product[0]['picture']; ?>" />
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label"></label>
										<label for="update_file" class="col-sm-2 col-form-label">Upload Image</label>
										<div class="col-sm-4" style="width:50%;">
											<input id='imgInput' type="file" class="form-control-file" name="update_file">
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

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
    <script>
		$(document).ready(function() {
			$('#summernote').summernote();
		});

		function imgChange(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#imgPreview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

        $(".menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

		$("#imgInput").change(function() {
			imgChange(this);
		});
    </script>
</html>
