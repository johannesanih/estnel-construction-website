<?php

    require_once('../config.php');
    require_once('../functions.php');
    require_once('../db_setup.php');
    require_once('../site_vars.php');

    initializeSession();
    if(!isset($_SESSION['admin_email'])) {
        header('Location: signin.php');
    }

    if(isset($_GET['of']) && isset($_GET['nr'])) {
        $offset = sanitizeString($_GET['of']);
        $noOfRows = sanitizeString($_GET['nr']);
    }

    if(empty($offset)) $offset = 0;
    if(empty($noOfRows)) $noOfRows = 10;

    $noMsg;
    $noOfMsgs = db_select_direct('SELECT COUNT(*) AS number FROM `'.DB_NAME.'`.`messages`');
    if($noOfMsgs) {
        $noMsg = $noOfMsgs['number'];
    }

    $numberOfParts = ceil($noMsg/$noOfRows);
    
?>
<?php require('page_parts/ADMIN_head.php'); ?>
<title><?php echo SITE_NAME; ?> - Home</title>
</head>
<body class="p-0">
    <div class="container-fluid m-0 p-0">
        <?php require('page_parts/ADMIN_dialog.php'); ?>
        <?php require('page_parts/ADMIN_header.php'); ?>
        <div class="p-3" id="messages">
            <h1 class="my-3 display-3 text-center">Your Messages</h1>
        <?php
            $sql = "SELECT `fullname`, `email`, `phonenumber`, `message`, ";
            $sql .= 'DATE_FORMAT(`date_sent`, "%M %D, %Y - %H:%i") AS dateSent ';
            $sql .= "FROM `".DB_NAME."`.`messages` ORDER BY `date_sent` DESC LIMIT $offset, $noOfRows";
            $select_messages = db_multiple_select_direct($sql);
            if($select_messages) {
                foreach($select_messages as $msgData) {
                    $sender = $msgData['fullname'];
                    $senderEmail = $msgData['email'];
                    $senderPhoneNumber = $msgData['phonenumber'];
                    $message = $msgData['message'];
                    $dateSent = $msgData['dateSent'];
                    echo "<div class='p-3 my-3 rounded bg-dark text-muted est-msg'>";
                    echo    "<div class=''>";
                    echo        "<span class='m-1 d-block text-primary'>Sender: $sender</span>";
                    echo        "<span class='m-1 d-block text-primary'>Sender's Email: $senderEmail</span>";
                    echo        "<span class='m-1 d-block text-primary'>Sender's Phone Number: $senderPhoneNumber</span>";
                    echo        "<span class='m-1 d-block text-primary'>Sent On: $dateSent</span>";
                    echo    "</div>";
                    echo    "<div class='mx-2 text-muted' id='message'>";
                    echo        "<p class='px-4'>$message</p>";
                    echo    "</div>";
                    echo "</div>";
                }
            }
        
        ?>
            <span class='m-4 d-block text-center'>
                <?php
                    $nextOffset = $offset + $noOfRows;
                    $prevOffset = $offset - $noOfRows;
                    if($offset == 0 && $numberOfParts > 1) {
                        echo '<a href="index.php?of='.$nextOffset.'&nr='.$noOfRows.'" class="btn btn-lg btn-success m-1">Next</a>';
                    } else if($offset > 0 && $offset < $numberOfParts-1) {
                        echo '<a href="index.php?of='.$prevOffset.'&nr='.$noOfRows.'" class="btn btn-lg btn-warning m-1">Prev</a><a href="index.php?of='.$nextOffset.'&nr='.$noOfRows.'" class="btn btn-lg btn-success m-1">Next</a>';
                    } else if($offset > 0 && $offset >= ceil($offset/$noOfRows)) {
                        echo '<a href="index.php?of='.$prevOffset.'&nr='.$noOfRows.'" class="btn btn-lg btn-warning m-1">Prev</a>';
                    }
                ?>
            </span>
        </div>
        
        <?php require('./page_parts/ADMIN_footer.php'); ?>
    </div>

    <?php require('page_parts/ADMIN_scripts.php'); ?>
</body>
</html>