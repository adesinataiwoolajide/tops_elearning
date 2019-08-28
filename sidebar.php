<div id="sidebar-wrapper" class="bg-theme bg-theme4" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="./">
        <img src="../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">Book Stores</h5>
        </a>
    </div>
    <div class="user-details">
        <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
            <div class="avatar">
                <img class="mr-3 side-user-img" src="../assets/images/logo-icon.png" alt="user avatar">
            </div>
            <div class="media-body">
                <h6 class="side-user-name"><?php echo $_SESSION['name'] ?></h6>
            </div>
        </div>
        <div id="user-dropdown" class="collapse">
            <ul class="user-setting-menu">
                <li><a href=""><i class="icon-user"></i>  My Profile</a></li>
                <li><a href=""><i class="icon-settings"></i> Setting</a></li>
                <li><a href=""><i class="icon-power"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li><a href="./" class="waves-effect"><i class="zmdi zmdi-home text-danger"></i> <span>Dashboard</span></a></li>
        
        
        <li><a href="category.php" class="waves-effect"><i class="fa fa-cogs text-success"></i> <span>Offence Category</span></a></li>
       
        <li><a href="order.php" class="waves-effect"><i class="fa fa-users text-info"></i> <span>Users</span></a></li>
        <li><a href="order.php" class="waves-effect"><i class="fa fa-cloud text-info"></i> <span>Activity Log</span></a></li>
       
        <li><a href="../log-out.php" class="waves-effect"><i class="fa fa-lock"></i> <span>Logout</span></a></li>
    </ul>
</div>