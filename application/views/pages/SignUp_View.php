<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $css;
			echo $js;
		?>
    <title>Sign Up GamePlay</title>
	</head>
	<body class="bgGrey2">
		<?php echo $header; ?>
		<div class="container-fluid wrapper">
			<div class="card">
				<div class="card-header">
					<h4 class="modal-title text-center"><span style="color:black;">Game<strong style="color:blue;">Play</strong> Sign Up</span></h4>
				</div>
				<form class="form-signup" method="POST" action="SignUp/signup">
					<div class="form-group">
						<input type="text" class="form-control" name="signup_username" placeholder="Username" >
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="signup_password" placeholder="Password" >
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="signup_confpassword" placeholder="Confirm Password" >
					</div>

					<?php
						if($this->session->signUp_HP == 'gagal'){
							echo "<h5 class='alert alert-warning text-center'>". $error. "</h5>";
							$this->session->unset_userdata('signUp_HP');
						}
					?>

					<div class="form-group">
						<input type="text" class="form-control" name="signup_nama" placeholder="Nama Lengkap" >
					</div>

					<div class="form-group">
						<input type="email" class="form-control" name="signup_email" placeholder="Email" >
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="signup_HP" placeholder="Nomor Handphone" >
					</div>

					<?php
						if($this->session->signUp_password == 'gagal') {
							echo "<h5 class='alert alert-warning text-center'>". $errorNum. "</h5>";
							$this->session->unset_userdata('signUp_password');
						}
					?>

					<div class="form-group">
						<textarea class="form-control" name="signup_alamat" placeholder="Alamat Lengkap" rows="5" ></textarea>
					</div>

					<h5 id='loginFailed' class="text-center" style="color:red;"></h5>

					<div class="form-group">
						<div align="right">
							<input class="btn btn-primary" type="submit" name="Submit" value="Sign Up">
							<input class="btn btn-danger" type="submit" name="Cancel" value="Cancel">
						</div>
					</div>
				</form>
				<div class="card-footer text-center">
					<p class="text-center">Already have an account? <a href="<?php echo base_url() . 'Login'; ?>">Sign In</a></p>
				</div>
			</div>
		</div>
	</body>
	<style>
		.wrapper{
			min-height: 85%;
			min-height: 85vh;
			display: flex;
			align-items: center;
		}
		.card {
			float: auto;
			margin: 2% auto 2%;
			background: #EEEEEE;
			width: 30%;
			min-width: 300px;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
			border-radius: 5px;
		}
		.card > form {
			margin:10px;
		}
		.card > form input[type=text],
		.card > form input[type=password],
		.card > form input[type=email] {
			height: 40px;
			text-align: left;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
		.card-header{
			background-color: #F9F9F9;
			border-bottom: 2px solid #999999;
			padding: 15px;
			text-align: center;
			-webkit-border-radius: 10px 10px  0 0 ;
		}
		.card-footer{
			background-color: #F9F9F9;
			border-top: 2px solid #999999;
			padding: 15px;
			text-align: center;
			-webkit-border-radius: 0 0 10px 10px;
		}

		textarea {
		   resize: none;
		}
		</style>
		<script>
		<?php if($this->session->signUp == "gagal") { ?>
			$('#loginFailed').text('Proses pendaftaran gagal. Silahkan coba lagi.');
		<?php $this->session->unset_userdata('signUp'); } ?>
		<?php if($this->session->signUp == "sama") { ?>
			$('#loginFailed').text('Sudah ada akun yang digunakan. Silahkan coba lagi.');
		<?php $this->session->unset_userdata('signUp'); } ?>
		</script>
</html>
