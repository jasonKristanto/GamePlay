<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $css;
			echo $js;
		?>
    <title>Login GamePlay</title>
	</head>
	<body>
    <?php
      echo $header;
    ?>

		<div class="container-fluid" style="width:300px;">
			<form class="form-signin" method="post" action="Login/login">

	      <div class="text-center mb-4">
	        <h1 class="h3 mb-3 font-weight-normal">GamePlay Login</h1>
	      </div>

	      <div class="form-label-group text-center">
					<label for="login_username">Username</label>
	        <input type="text" name="login_username" class="form-control" placeholder="Username" required>
	      </div>
				<br>
	      <div class="form-label-group text-center">
					<label for="login_password">Password</label>
	        <input type="password" name="login_password" class="form-control" placeholder="Password" required>
	      </div>

	      <input class="btn btn-lg btn-primary btn-block" type="submit" name="Login" value="Login">

	      <p class="text-center">Don't have any account? <a href="<?php echo base_url() . 'SignUp'; ?>">Sign Up</a></p>

	    </form>
		</div>
	</body>
</html>
