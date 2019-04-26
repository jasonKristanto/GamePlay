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

		<div class="container-fluid" >			
			<form class="form-group" method="POST" action="Admin_Delete/delete_action">
			<div class="form-group">
				<h3 class="text-center"> 
					Apakah Anda yakin ingin menghapus produk 
					<?php echo $product[0]['productName']; ?> dari daftar produk? 
				</h3> 

				<br>				

				<input type="hidden" class="form-control" name="delete_id" value="<?php echo $product[0]['ID']; ?>">

				<div class="form-group row">
					<div align="center">
						<input class="btn btn-primary" type="submit" name="Delete" value="Delete">
						<input class="btn btn-danger" type="submit" name="Cancel" value="Cancel">
					</div>
				</div>	
			</div>
		</form>
		</div>	

		<script type="text/javascript">
			$(document).ready(function() {
				
			});
		</script>
	</body>
</html>