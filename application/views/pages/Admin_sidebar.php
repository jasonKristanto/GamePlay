<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <nav class="navbar navbarx navbar-default darkBlue">
            <div class="container-fluid">
                <div class="navbar-header headerx">
                    <a href="#" class="navbar-brand">
                        <span style="color:white">Game<strong style="color:red">Play</strong> Admin</span>
                    </a>
                </div>
            </div>
        </nav>
        <li class="nav-item" >
            <a href="#productMenu" data-toggle="collapse" class="dropdown-toggle">Product<span class="caret"></span></a>
            <ul class="collapse" id="productMenu">
                <li><a href="<?php echo base_url() . 'Admin'; ?>">Product List</a></li>
                <li><a href="<?php echo base_url() . 'Admin_Insert'; ?>">New Product</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url() . 'Admin_User'; ?>">User</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url() . 'Admin_Transaction'; ?>">Transaction</a>
        </li>
    </ul>
</div>