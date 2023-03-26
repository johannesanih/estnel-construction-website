<?php
    require_once('../config.php');
    require_once('../functions.php');
    require_once('../db_setup.php');
    require_once('../site_vars.php');
?>
<?php require('page_parts/DOC_head.php'); ?>
<title><?php echo SITE_NAME; ?> - Home</title>
<style type="text/css">
    body {
        background-color: var(--bc-2-light);
    }
    .contact {
        background-color: var(--bc-2-light);
    }
</style>
</head>
<body class="p-0">
    <div class="container-fluid m-0 p-0">
        <?php require('page_parts/PAGE_dialog.php'); ?>
        <?php require('page_parts/PAGE_header.php'); ?>
        <div id="cover-bg" class="text-light">
            <div id="blind">
                <div class="p-5 text-center" id="intro">
                    <h1 class="m-0 text-center" id="intro-1">Become Part Of Our List Of Satisfied And Happy Clients</h1>
                    <h1 class="m-0 text-center" id="intro-2">Contact Us Now</h1>
                </div>
                <div class="m-3 text-center text-light p-3 pb-5" id="main-action-btn-cont">
                    <a href="contact.php" class="d-inline-block btn btn-lg text-light" id="main-action-btn">Reach Us</a>
                </div>
            </div>
        </div>
        <?php require('./page_parts/PAGE_contact.php'); ?>
        <?php require('./page_parts/PAGE_footer.php'); ?>
    </div>

    <?php require('page_parts/DOC_scripts.php'); ?>
</body>
</html>