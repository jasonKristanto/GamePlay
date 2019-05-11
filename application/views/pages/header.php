<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header" style="padding: 0 5%">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">GamePlay</a>
		</div>
		<form class="form-inline col-md-4" style="padding: 0 5%" method="POST" action="<?php echo base_url() . "Home/search" ?>">
	    <input class="form-control" type="search" placeholder="Search" name="search">
	    <button class="btn btn-primary" type="submit">Search</button>
	  </form>
		<ul class="nav navbar-nav navbar-right" style="padding: 0 5%">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
					<Strong>
						<?php
							if(isset($this->session->nama)){
								echo $this->session->nama;
							}
							else {
								echo "GUEST";
							}
						?>
						<span class="caret"></span>
					</Strong>
				</a>
				<ul class="dropdown-menu">
					<?php if(!isset($this->session->nama)) { ?>
						<li><a href='<?php echo base_url() . "Login" ?>'>Login</a></li>
						<li><a href='<?php echo base_url() . "SignUp" ?>'>Sign Up</a></li>
					<?php } ?>
					<li><a href="<?php echo base_url() . "Cart"; ?>">Cart</a></li>

					<?php if(isset($this->session->nama)) { ?>
						<li><a href='<?php echo base_url() . "Login/logout" ?>'>Logout</a></li>
					<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
</nav>

<script>
		$('.dropdown-toggle').dropdown();
</script>
