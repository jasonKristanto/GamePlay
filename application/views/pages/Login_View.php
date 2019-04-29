<!DOCTYPE html>
<html>
	<head>
		<?php
			echo $css;
		?>
    <title>Login GamePlay</title>
	</head>
	<body>
    <?php
      if(isset($_GET['status'])){
        if($_GET['status'] == 'gagal'){
          echo "<script>alert(\"Username dan/atau Password Salah\")</script>";
        }
      }
    ?>

    <form class="form-signin" method="post" action="Login/login">
      <div class="text-center mb-4">
        <img class="mb-4" src="./login_files/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">GamePlay Login</h1>
      </div>

      <div class="form-label-group">
        <input type="text" name="login_username" class="form-control" placeholder="Username" required>
        <label for="login_username">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="login_password" class="form-control" placeholder="Password" required>
        <label for="login_password">Password</label>
      </div>

      <input class="btn btn-lg btn-primary btn-block" type="submit" name="Login" value="Login">

      <p>Don't have any account? <a href="<?php echo base_url() . 'SignUp'; ?>">Sign Up</a></p>

    </form>

		<div class="card" style="width: 18rem;">
		  <img class="card-img-top" src="..." alt="Card image cap">
		  <div class="card-body">
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>

		<?php echo $js; ?>
	</body>
</html>
