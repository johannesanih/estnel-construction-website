<?php
    require_once('../site_vars.php')
?>
<?php require('page_parts/DOC_head.php'); ?>
<title><?php echo SITE_NAME; ?> - Projects</title>
</head>
<body class="p-0">
    <div class="container-fluid m-0 p-0">
        <?php require('page_parts/PAGE_dialog.php'); ?>
        <?php require('page_parts/PAGE_header.php'); ?>
        <div id="cover-bg" class="text-light">
            <div id="blind">
                <div class="p-5 text-center" id="intro">
                    <h1 class="m-0 text-center" id="intro-1">Our Past</h1>
                    <h1 class="m-0 text-center" id="intro-2">Projects</h1>
                </div>
                <div class="m-3 text-center text-light p-3 pb-5" id="main-action-btn-cont">
                    <a href="contact.php" class="d-inline-block btn btn-lg text-light" id="main-action-btn">Reach Us</a>
                </div>
            </div>
        </div>
        <div class="projects">

            <div class="p-5" id="services-1">
                <div class="" id="services-title-container">
                    <h1 id="services-title" class="text-center">
                        SOME OF OUR<br>AMAZING AND SUCCESSFUL<br>PROJECTS
                    </h2>
                </div>
                <div class="est-flex p-4">

                    <div class="m-3 shadow bg-white">
                        <span class="d-block">
                            <img src="./resources/images/img-10.png" alt="Foundation Work"  class="img-fluid services-image">
                        </span>
                        <span class="d-block text-center p-4">
                            <h5 class="text-center">ST. John Primary School 2<br>ISara Ogun State</h5>
                            <p class="text-center"></p>
                            <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                        </span>
                    </div>
                    <div class="m-3 shadow bg-white">
                        <span class="d-block">
                            <img src="./resources/images/img-11.png" alt="Foundation Work"  class="img-fluid services-image">
                        </span>
                        <span class="d-block text-center p-4">
                            <h5 class="text-center">PRIVATE RESIDENCE</h5>
                            <p class="text-center"></p>
                            <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                        </span>
                    </div>
                    <div class="m-3 shadow bg-white">
                        <span class="d-block">
                            <img src="./resources/images/img-12.png" alt="Foundation Work"  class="img-fluid services-image">
                        </span>
                        <span class="d-block text-center p-4">
                            <h3 class="text-center">Construction Of a<br>Warehouse</h3>
                            <p class="text-center"></p>
                            <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                        </span>
                    </div>

                </div>
                <div class="est-flex p-4">

                    <div class="m-3 shadow bg-white">
                        <span class="d-block">
                            <img src="./resources/images/img-13.png" alt="Foundation Work"  class="img-fluid services-image">
                        </span>
                        <span class="d-block text-center p-4">
                            <h5 class="text-center">Water Treatment Plant<br>Delta State</h5>
                            <p class="text-center"></p>
                            <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                        </span>
                    </div>
                    <div class="m-3 shadow bg-white">
                        <span class="d-block">
                            <img src="./resources/images/img-14.png" alt="Foundation Work"  class="img-fluid services-image">
                        </span>
                        <span class="d-block text-center p-4">
                            <h5 class="text-center">Road Construction<br>Akwa Ibom State<br>Completed 1KM</h5>
                            <p class="text-center"></p>
                            <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                        </span>
                    </div>
                    <div class="m-3 shadow bg-white">
                        <span class="d-block">
                            <img src="./resources/images/img-15.png" alt="Foundation Work"  class="img-fluid services-image">
                        </span>
                        <span class="d-block text-center p-4">
                            <h3 class="text-center">Graceland Schools<br>Akwa Ibom State</h3>
                            <p class="text-center"></p>
                            <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                        </span>
                    </div>

                </div>
            </div>

        </div>
        <?php require('./page_parts/PAGE_contact.php'); ?>
        <?php require('./page_parts/PAGE_footer.php'); ?>
    </div>

    <?php require('page_parts/DOC_scripts.php'); ?>
</body>
</html>