<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $js;
			echo $css;
		?>

		<title>Edit Profile</title>
	</head>
	<body class="bgGrey2">
		<?php echo $header; ?>
		<div class="container wrapper">
			<div class="card">
				<div class="card-header">
					<h2 class="modal-title text-center"><span style="color:black;">Edit Profile</h2>
				</div>
				<div class="box-body">
					<h5 id='editFailed' class="text-center" style="color:red;"></h5>

					<form class="form-signup" method="POST" action="<?php echo base_url() . "User_Profile/edit_action"; ?>" enctype="multipart/form-data">
						<div class="form-group" style="margin-top:20px;">
							<div class="form-group row">
								<label class="col-sm-2 col-sm-offset-2 col-form-label" for="update_id">Username</label>
								<div class="col-sm-6 col-8 col-offset-2">
									<input type="hidden" class="form-control" name="edit_id" value="<?php echo $user[0]['id']; ?>" >
									<input type="text" class="form-control" name="edit_username" value="<?php echo $user[0]['username']; ?>" >
								</div>
							</div>

							<div class="form-group" style="margin-top:20px;">
								<div class="form-group row">
									<label class="col-sm-2 col-sm-offset-2 col-form-label" for="update_id">Password</label>
									<div class="col-sm-6 col-8 col-offset-2">
										<input type="password" class="form-control" name="edit_password" value="<?php echo $user[0]['password']; ?>">
									</div>
								</div>
							</div>

							<div class="form-group" style="margin-top:20px;">
								<div class="form-group row">
									<label class="col-sm-2 col-sm-offset-2 col-form-label" for="update_id">Confirm Password</label>
									<div class="col-sm-6 col-8 col-offset-2">
										<input type="password" class="form-control" name="edit_retypepassword" value="">
										<?php if($this->session->editPass == 'gagal'){
														echo "<h5 class='alert alert-warning'>". $error. "</h5>";
														$this->session->unset_userdata('editPass');
													}
										?>
									</div>
								</div>
							</div>

							<div class="form-group" style="margin-top:20px;">
								<div class="form-group row">
									<label class="col-sm-2 col-sm-offset-2 col-form-label" for="update_id">Nama</label>
									<div class="col-sm-6 col-8 col-offset-2">
										<input type="text" class="form-control" name="edit_nama" value="<?php echo $user[0]['nama']; ?>">
									</div>
								</div>
							</div>

							<div class="form-group" style="margin-top:20px;">
								<div class="form-group row">
									<label class="col-sm-2 col-sm-offset-2 col-form-label" for="update_id">Email</label>
									<div class="col-sm-6 col-8 col-offset-2">
										<input type="email" class="form-control" name="edit_email" value="<?php echo $user[0]['email']; ?>">
									</div>
								</div>
							</div>

							<div class="form-group" style="margin-top:20px;">
								<div class="form-group row">
									<label class="col-sm-2 col-sm-offset-2 col-form-label" for="update_id">Nomor Handphone</label>
									<div class="col-sm-6 col-8 col-offset-2">
										<input type="text" class="form-control" name="edit_HP" value="<?php echo $user[0]['nomor_handphone']; ?>">
										<?php if($this->session->editHP == "gagal"){
														echo "<h5 class='alert alert-warning'>". $errorNum. "</h5>";
														$this->session->unset_userdata('editHP');
													}
										?>
									</div>
								</div>
							</div>

							<div class="form-group" style="margin-top:20px;">
								<div class="form-group row">
									<label class="col-sm-2 col-sm-offset-2 col-form-label" for="update_id">Alamat</label>
									<div class="col-sm-6 col-8 col-offset-2">
										<textarea class="form-control" name="edit_alamat" rows="5"><?php echo $user[0]['alamat']; ?></textarea>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label for="poster" class="col-sm-2 col-sm-offset-2 col-form-label">Image Preview</label>
								<div class="col-sm-6 col-8 col-offset-2">
									<img id="imgPreview" style="max-width: 100px;" src="<?php echo base_url('assets/pict_user/') . $user[0]['picture']; ?>" />
								</div>
							</div>

							<div class="form-group row">
								<label for="update_file" class="col-sm-2 col-sm-offset-2 col-form-label">Upload Image</label>
								<div class="col-sm-6 col-8 col-offset-2">
									<input id='imgEdit' type="file" class="form-control-file" name="edit_file">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-4 col-sm-offset-8" align="right">
									<input class="btn btn-primary" type="submit" name="Submit" value="Edit">
									<input class="btn btn-danger" type="submit" name="Cancel" value="Cancel">
								</div>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>
	</body>
	<style>
		textarea {
			 resize: none;
		}
	</style>
	<script>
		function imgChange(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#imgPreview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#imgEdit").change(function() {
			imgChange(this);
		});

		<?php if($this->session->edit == "gagal") { ?>
			$('#editFailed').text('Proses perubahan gagal. Silahkan coba lagi.');
		<?php $this->session->unset_userdata('edit'); } ?>

		<?php if($this->session->edit == "sama") { ?>
			$('#editFailed').text('Sudah ada akun yang digunakan. Silahkan coba lagi.');
		<?php $this->session->unset_userdata('edit'); } ?>
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
				margin: 2% auto 2%;
				padding: 0;
				width: 100%;
				background: #EEEEEE;
				box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
				border-radius: 5px;
			}
			.col-centered{
				float: none;
				margin: 0 auto;
			}
			.card-header{
				background-color: #F9F9F9;
				border-bottom: 2px solid #999999;
				padding: 15px;
				text-align: center;
				-webkit-border-radius: 10px 10px  0 0 ;
			}
		</style>
</html>
