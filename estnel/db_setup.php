<?php

    //require_once('config.php');
    require_once('functions.php');

    db_create_table (
        'messages',
        '`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `fullname` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        `phonenumber` VARCHAR(255) NOT NULL,
        `message` TEXT NOT NULL,
        `date_sent` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP'
    );

?>