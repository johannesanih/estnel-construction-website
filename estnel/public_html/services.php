<?php
    require_once('../site_vars.php')
?>
<?php require('page_parts/DOC_head.php'); ?>
<title><?php echo SITE_NAME; ?> - Services</title>
</head>
<body class="p-0">
    <div class="container-fluid m-0 p-0">
        <?php require('page_parts/PAGE_dialog.php'); ?>
        <?php require('page_parts/PAGE_header.php'); ?>
        <div id="cover-bg" class="text-light">
            <div id="blind">
                <div class="p-5 text-center" id="intro">
                    <h1 class="m-0 text-center" id="intro-1">Our Professional</h1>
                    <h1 class="m-0 text-center" id="intro-2">Services</h1>
                </div>
                <div class="m-3 text-center text-light p-3 pb-5" id="main-action-btn-cont">
                    <a href="contact.php" class="d-inline-block btn btn-lg text-light" id="main-action-btn">Reach Us</a>
                </div>
            </div>
        </div>
        <div id="services" class="p-2">

            <div class="p-5" id="services-1">
                <div class="" id="services-title-container">
                    <h1 id="services-title" class="text-center">
                        WE PROVIDE THE BEST CONSTRUCTION SERVICES
                    </h2>
                </div>
                <div class="p-3">
                    <div class="est-flex">

                        <div class="m-3 shadow">
                            <span class="d-block">
                                <img src="./resources/images/img-4.png" alt="Foundation Work"  class="img-fluid services-image">
                            </span>
                            <span class="d-block text-center p-4">
                                <h3 class="text-center">BUILDING<br>CONSTRUCTION</h3>
                                <p class="text-center"></p>
                                <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                            </span>
                        </div>
                        <div class="m-3 shadow">
                            <span class="d-block">
                                <img src="./resources/images/img-5.png" alt="Foundation Work"  class="img-fluid services-image">
                            </span>
                            <span class="d-block text-center p-4">
                                <h3 class="text-center">ROAD<br>CONSTRUCTION</h3>
                                <p class="text-center"></p>
                                <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                            </span>
                        </div>
                        <div class="m-3 shadow">
                            <span class="d-block">
                                <img src="./resources/images/img-6.png" alt="Foundation Work"  class="img-fluid services-image">
                            </span>
                            <span class="d-block text-center p-4">
                                <h3 class="text-center">RENOVATION</h3>
                                <p class="text-center"></p>
                                <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                            </span>
                        </div>

                    </div>
                    <div class="est-flex p-4">

                        <div class="m-3 shadow">
                            <span class="d-block">
                                <img src="./resources/images/img-8.png" alt="Foundation Work"  class="img-fluid services-image">
                            </span>
                            <span class="d-block text-center p-4">
                                <h3 class="text-center">ARCHITECTURAL<br>DESIGN</h3>
                                <p class="text-center"></p>
                                <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                            </span>
                        </div>
                        <div class="m-3 shadow">
                            <span class="d-block">
                                <img src="./resources/images/img-1.png" alt="Foundation Work"  class="img-fluid services-image">
                            </span>
                            <span class="d-block text-center p-4">
                                <h3 class="text-center">FIXING<br>AND<br>SUPPORT</h3>
                                <p class="text-center"></p>
                                <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                            </span>
                        </div>
                        <div class="m-3 shadow">
                            <span class="d-block">
                                <img src="./resources/images/img-9.png" alt="Foundation Work"  class="img-fluid services-image">
                            </span>
                            <span class="d-block text-center p-4">
                                <h3 class="text-center">PAINTING</h3>
                                <p class="text-center"></p>
                                <a href="contact.php" class="btn btn-md text-center services-btn">Reach Us</a>
                            </span>
                        </div>

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