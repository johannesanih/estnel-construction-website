<?php

    require_once('../functions.php');

    initializeSession();

    if(destroySession()) {
        header('Location: index.php');
    }

?>