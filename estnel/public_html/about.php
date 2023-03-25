<?php
    require_once('../site_vars.php')
?>
<?php require('page_parts/DOC_head.php'); ?>
<title><?php echo SITE_NAME; ?> - About</title>
</head>
<body class="p-0">
    <div class="container-fluid m-0 p-0">
        <?php require('page_parts/PAGE_dialog.php'); ?>
        <?php require('page_parts/PAGE_header.php'); ?>
        <div id="cover-bg" class="text-light">
            <div id="blind">
                <div class="p-5 text-center" id="intro">
                    <h1 class="m-0 text-center" id="intro-1">About</h1>
                    <h1 class="m-0 text-center" id="intro-2">ESTNEL</h1>
                </div>
                <div class="m-3 text-center text-light p-3 pb-5" id="main-action-btn-cont">
                    <a href="contact.php" class="d-inline-block btn btn-lg text-light" id="main-action-btn">Reach Us</a>
                </div>
            </div>
        </div>
        <div id="about" class="p-2">

            <div class="est-flex p-5" id="about-1">
                <div class="p-2 w-60 pe-4">
                    <h1 class="display-5" id="about-title">
                        ABOUT ESTNEL
                    </h1>
                    <p>
                        ESTNEL MULTI CONCEPT LIMITED is an indigenous company incorporated in Nigeria to render Engineering and Construction Services in the areas of Housing, Roads, Civil and Marine Engineering.<br>
                        The Company has been rendering construction services in Nigeria since 2008 before being incorporated on the 22nd day of January 2013, under the companies and allied matter Act 1990.
                    </p>
                </div>
                <div class="w-40">
                    <img src="./resources/images/img-1.png" alt="Image of an Engineer Aligning Columns" class="img-fluid" id="about-1-pic">
                </div>
            </div>

            <div class="est-flex p-5" id="about-2">
                <div class="w-40">
                    <img src="./resources/images/img-2.png" alt="Image of two engineers inspecting the last floor slabs of a building" class="img-fluid" id="about-2-pic">
                </div>
                <div class="ps-4 p-2 w-60">
                    <h1 class="display-5" id="about-title">
                        Our Strength
                    </h1>
                    <p>
                        We are committed to investing and developing our people by supporting the enthusiasm and creativity of Nigerian professional who have distinguished themselves in the areas of professional calling.<br>
                        Building on a solid foundation, the company is made up of a strong and dynamic Board of Directors an efficient management team and a result-oriented workfare and excellent foreign partner with Nigerian Engineers bringing to ESTNEL we strive to channel this union in a way that inspires them to do their best every day.<br>
                        We are developing an amazing workforce of Engineers, Quantity Surveyor, Architects And Others Support Staff Working together on schemes of all types and complexities their attitude, local knowledge and imagination set us apart.
                    </p>
                </div>
            </div>

            <div class="est-flex p-5" id="about-1">
                <div class="p-2 w-60 pe-4">
                    <h1 class="display-5" id="about-title">
                        Core Operation
                    </h1>
                    <p>
                        ESTNEL MULTI CONCEPT LIMITED has a proven record over the short period, a brand name in construction industry known both globally and locally.<br>
                        The company has been for discerning engaged in the area of Civil Engineering Construction Industry. These highly qualified and experienced persons are dedicated to render services to our clients at all times. The company employs over 20 people at more than 5 location and has attained a building performance output of over 20M Naira in the last 1 year.
                    </p>
                </div>
                <div class="w-40">
                    <img src="./resources/images/img-3.png" alt="Image of an Engineer Aligning Columns" class="img-fluid" id="about-3-pic">
                </div>
            </div>

        </div>
        <?php require('./page_parts/PAGE_contact.php'); ?>
    </div>

    <?php require('page_parts/DOC_scripts.php'); ?>
</body>
</html>