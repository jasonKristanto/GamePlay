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

    <h1 class="text-center"> Sign Up </h1> <br>

    <form class="form-group" method="POST" action="SignUp/signup">
			<div class="form-group">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="signup_username">Username</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="signup_username" placeholder="Username">
					  </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="signup_username">Password</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="password" class="form-control" name="signup_password" placeholder="Password">
					  </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="signup_nama">Nama Lengkap</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="signup_nama" placeholder="Nama Lengkap">
					  </div>
				</div>

        <div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="signup_email">Email</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="email" class="form-control" name="signup_email" placeholder="Email">
					  </div>
				</div>

        <div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
				    <label class="col-sm-2 col-form-label" for="signup_alamat">Alamat Lengkap</label>
				    <div class="col-sm-4" style="width:50%;">
					    <input type="text" class="form-control" name="signup_alamat" placeholder="Alamat Lengkap">
					  </div>
				</div>

        <div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-4" align="right" style="width: 50%;">
						<input class="btn btn-primary" type="submit" name="Submit" value="Sign Up">
						<input class="btn btn-danger" type="submit" name="Cancel" value="Cancel">
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
