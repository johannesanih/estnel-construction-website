<?php

    require_once('../config.php');
    require_once('../functions.php');
    require_once('../db_setup.php');
    require_once('../site_vars.php');
    
    initializeSession();
    if(isset($_SESSION['admin_email'])) {
        header('Location: index.php');
    }

?>
<?php require('page_parts/ADMIN_head.php'); ?>
<title><?php echo SITE_NAME; ?> - Home</title>
</head>
<body class="p-0 bg-dark">
    <div class="container-fluid m-0 p-0">
        <?php require('page_parts/ADMIN_dialog.php'); ?>
        <?php require('page_parts/ADMIN_header.php'); ?>

        <div class="est-flex my-5" id="signin-div">
            <div id="signin-form">
                <div class="m-2">
                    <span class="d-block display-6 text-center text-danger">Admin Sign In</span>
                </div>
                <!--<div class="m-2">
                    <input type="text" class="d-block est-input bg-white" name="fullname" id="fullname-inp" placeholder="Fullname">
                </div>-->
                <div class="m-2">
                    <input type="email" class="d-block est-input bg-white" name="email" id="email-inp" placeholder="Email">
                </div>
                <div class="m-2">
                    <input type="password" class="d-block est-input bg-white" name="password" id="password-inp" placeholder="Password">
                </div>
                <div class="m-2">
                    <button class="d-block w-100 btn btn-lg btn-danger" id="signinBtn">Sign In</button>
                </div>
                <div class="m-2 text-center text-muted">
                    Don't yet have an account? <a href="signup.php" class="text-danger text-decoration-underline">Sign Up</a>
                </div>
            </div>
        </div>
        
        <?php require('./page_parts/ADMIN_footer.php'); ?>
    </div>

    <?php require('page_parts/ADMIN_scripts.php'); ?>
</body>
</html>