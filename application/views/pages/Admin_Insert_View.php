<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>Insert Product</title>
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
											<textarea id="summernote" class="form-control" name="insert_desc" placeholder="Description"></textarea>
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
											<button href="#genreList" data-toggle="collapse" class="genre-toggle btn">Genre</button>
											<div class="collapse" id="genreList">
												<?php
													foreach ($genre as $row) {
														echo "<input type='checkbox' name='insert_genre[]' value='" . $row['genre'] . "'>" . ucwords($row['genre']) . "<br>";
													}
												?>
											</div>
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
										<label class="col-sm-2 col-form-label">Image Preview</label>
										<div class="col-sm-4" style="width:50%;">
											<img id="imgPreview" style="max-width: 100px;" src="" />
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label"></label>
										<label for="insert_file" class="col-sm-2 col-form-label">Upload Image</label>
										<div class="col-sm-4" style="width:50%;">
											<input id='imgInput' type="file" class="form-control-file" name="insert_file">
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

		$(".genre-toggle").click(function(e) {
            e.preventDefault();
            $("#genreList").toggleClass("toggled");
        });
    </script>
</html>
