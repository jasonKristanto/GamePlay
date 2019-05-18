<div class="header-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 text-center text-lg-left">
				<a class="site-logo" href="<?php echo base_url(); ?>" >
					<span style="color:grey;">Game<strong style="color:blue;">Play</strong></span>
				</a>
            </div>
            <div class="col-md-6">
				<form class="header-search" method="POST" action="<?php echo base_url() . "Home/search" ?>">
                    <input class="form-control" type="search" name="search" placeholder="Search game ....">
                    <button type="submit"><i class="flaticon-search"></i></button>
                </form>
            </div>
            <div class="col-md-4">
				<ul class="nav navbar-nav navbar-right" style="padding: 0 5%">
					<?php if(isset($this->session->nama)){ ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="flaticon-profile"></i>
								<Strong>
									<?php echo $this->session->nama; ?>
									<span class='caret'></span>
								</Strong>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url() . "Cart"; ?>">Cart</a></li>
								<li><a href='<?php echo base_url() . "Login/logout" ?>'>Logout</a></li>
							</ul>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<span>
								<i class="flaticon-profile"></i>
								<strong><a href='<?php echo base_url() . "Login" ?>'>Login</a></strong> or
								<strong><a href='<?php echo base_url() . "SignUp" ?>'>Sign Up</a></strong>
							</span>
						</li>
					<?php } ?>
				</ul>
            </div>
        </div>
    </div>
</div>
<script>
	$('.dropdown-toggle').dropdown();
</script>
<style>
.header-top {
	padding: 10px 0 10px;
	background-color: #CFCFCF;
}
.site-logo {
	display: inline-block;
	font-size:30px;
	text-decoration: none !important;
}
.navbar-nav > li > span {
	padding-top: 15px;
	padding-bottom: 15px;
	line-height: 20px;
	position: relative;
    display: block;
    padding: 10px 15px;
}
.header-search input {
	width: 100%;
	height: 44px;
	font-size: 14px;
	border-radius: 50px;
	border: none;
	padding: 0 19px;
	background: #F0F0F0;
}
.header-search button {
	position: absolute;
	height: 100%;
	right: 25px;
	top: 0;
	font-size: 20px;
	color: #000;
	border: none;
	cursor: pointer;
	background-color: transparent;
}
.user-panel .up-item {
	display: inline-block;
	font-size: 14px;
}

</style>