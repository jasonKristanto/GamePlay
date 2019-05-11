<nav class="navbar navbar-default navbarx ">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="pull-left navbar-toggle collapsed menu-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<ul class="nav navbar-nav navbar-right" style='padding: 0'>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><Strong>MENU<span class="caret"></span></Strong></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>">See Site</a></li>
					<li><a href='<?php echo base_url() . 'Admin/logout'; ?>'>Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>


<script>
		$('.dropdown-toggle').dropdown();			
</script>
