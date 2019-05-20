<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $css;
			echo $js;
		?>
    <title>Login GamePlay</title>
	</head>
	<body class="bgGrey2">
		<?php echo $header; ?>
		<div class="container-fluid wrapper">
			<div class="card" style="width:300px;">
				<div class="card-header">
					<h4 class="modal-title text-center"><span style="color:black;">Game<strong style="color:blue;">Play</strong> Sign In</span></h4>
				</div>
				<form class="form-signin" method="post" action="Login/login">
					<div class="form-group">
						<input type="text" name="login_username" class="form-control" placeholder="Username" required>
					</div>
					<div class="form-group">
                        <input type="password" name='login_password' class="form-control" placeholder="Password" required>
                    </div>
					<?php if($this->session->login == 'gagal'){ ?>
						<div class="alert alert-warning" align="center">Login failed, please check your username or password</div>
					<?php $this->session->unset_userdata('login'); }?>
					<input class="btn btn-lg btn-primary btn-block" type="submit" name="Login" value="Login">
				</form>
				<div class="card-footer text-center">
					<p class="text-center">Don't have any account? <a href="<?php echo base_url() . 'SignUp'; ?>">Sign Up</a></p>
				</div>
			</div>
		</div>
	</body>
	<style>
		.wrapper{
			min-height: 75%;
			min-height: 75vh;
			display: flex;
			align-items: center;
		}
		.card {
			float: auto;
			margin: 0 auto;
			background: #EEEEEE;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
			border-radius: 5px;
		}
		.card > form {
			margin:10px;
		}
		.card > form input[type=text],
		.card > form input[type=password] {
			height: 40px;
			text-align: center;
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
		</style>
</html>
