<?php

    require_once('../config.php');
    require_once('../functions.php');
    require_once('../db_setup.php');
    require_once('../site_vars.php');

    initializeSession();
    if(!isset($_SESSION['admin_email'])) {
        header('Location: signin.php');
    }
    
?>
<?php require('page_parts/ADMIN_head.php'); ?>
<title><?php echo SITE_NAME; ?> - Home</title>
</head>
<body class="p-0">
    <div class="container-fluid m-0 p-0">
        <?php require('page_parts/ADMIN_dialog.php'); ?>
        <?php require('page_parts/ADMIN_header.php'); ?>
        
        <?php require('./page_parts/ADMIN_footer.php'); ?>
    </div>

    <?php require('page_parts/ADMIN_scripts.php'); ?>
</body>
</html>