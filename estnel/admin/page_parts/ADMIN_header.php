<?php require_once('../site_vars.php'); ?>
<?php require('ADMIN_side_menu.php'); ?>
<header id="page-header" class="d-flex justify-content-between sticky-top shadow p-2 pb-3">
    <a href="index.php" class="text-decoration-none">
        <span class="d-flex justify-content-center">
            <img src="../public_html/resources/images/page-icon-red.png" alt="[ESNET LOGO]" id="page-icon" class="img-fluid p-3">
            <span class="text-light">
                <h1 class="m-0"><?php echo SITE_NAME ?> Admin</h1>
            </span>
        </span>
    </a>
    <span id="lg-menu">
        <?php
            if(isset($_SESSION['admin_email'])) {
                //echo '<span class="btn btn-lg btn-primary m-1 text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="javascript:void(0)">Inbox</a></span>';
                //echo '<span class="btn btn-lg btn-primary m-1 text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="javascript:void(0)">Admins</a></span>';
                echo '<span class="btn btn-lg btn-danger m-1 text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="javascript:void(0)" id="nlogoutBtn">Log Out</a></span>';
            } else if(!isset($_SESSION['admin_email'])) {
                echo '<span class="btn btn-lg btn-success text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="javascript:void(0)">Sign In</a></span>';
            }
        ?>
    </span>
    <span class="menu-btn" id="menu-icon">
        <span class="menu-line"></span>
        <span class="menu-line"></span>
        <span class="menu-line"></span>
    </span>
</header>