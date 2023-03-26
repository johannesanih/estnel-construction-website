<?php require_once('../site_vars.php'); ?>
<?php require('PAGE_side_menu.php'); ?>
<header id="page-header" class="d-flex justify-content-between sticky-top shadow p-2 pb-3">
    <a href="index.php" class="text-decoration-none">
        <span class="d-flex justify-content-center">
            <img src="./resources/images/page-icon-red.png" alt="[ESNET LOGO]" id="page-icon" class="img-fluid p-3">
            <span class="text-light">
                <h1 class="m-0"><?php echo SITE_NAME ?></h1>
                <h4 class="m-0"><?php echo SITE_SUB_NAME ?></h4>
            </span>
        </span>
    </a>
    <span id="lg-menu">
        <span class="btn btn-lg text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="index.php">Home</a></span>
            <span class="btn btn-lg text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="projects.php">Project</a></span>
            <span class="my-2 btn btn-lg text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="services.php">Services</a></span>
            <span class="btn btn-lg text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="about.php">About Us</a></span>
            <span class="btn btn-lg text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="contact.php">Contact</a></span>
        </span>
    <span class="menu-btn" id="menu-icon">
        <span class="menu-line"></span>
        <span class="menu-line"></span>
        <span class="menu-line"></span>
    </span>
</header>