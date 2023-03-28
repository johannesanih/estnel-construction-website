<?php

    require_once('config.php');

    function db_query ($query) {
        global $dbcon;
        $result = $dbcon->query($query);
        if($result) {
            return true;
        } else {
            die('Unable to execute MySQL query: '.$query);
        }
    }

    function db_create_table ($table_name, $table_query) {
        global $dbcon;
        $sql = 'CREATE TABLE IF NOT EXISTS '.DB_NAME.'.`'.$table_name.'`('.$table_query.')';
        $result = $dbcon->query($sql);
        if($result) {
            return true;
        } else {
            die('Unable to create MySQL Table, query: '.$sql);
        }
    }

    function initializeSession () {
        session_start();
    }

    function startSession (array $session_data = array('guest' => true)) {
        session_start();
        $_SESSION = $session_data;
    }

    function destroySession () {
        $_SESSION = array();
        if(session_id() !== '' || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-2592000,'/');
            session_destroy();
            return true;
        }
    }

    function sanitizeString($string) {
        $string = strip_tags($string);
        $string = htmlentities($string);
        $string = stripslashes($string);
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        return $string;
    }

    function sanitizeEmail($emailString) {
        $emailString = strip_tags($emailString);
        $emailString = htmlentities($emailString);
        $emailString = stripslashes($emailString);
        $emailString = filter_var($emailString, FILTER_SANITIZE_EMAIL);
        return $emailString;
    }

    function validateEmail($emailString) {
        $emailString = strip_tags($emailString);
        $emailString = htmlentities($emailString);
        $emailString = stripslashes($emailString);
        if(filter_var($emailString, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    function db_insert ($table_name, array $table_data) {
        global $dbcon;
        $columns = array_keys($table_data);
        $values = array_values($table_data);
        $sql = 'INSERT INTO '.DB_NAME.'.`'.$table_name.'` (`';
        $sql .= implode('`, `', $columns).'`) ';
        $sql .= "VALUES('".implode("', '", $values)."')";
        $result = $dbcon->query($sql);
        if($result) {
            return true;
        } else {
            $errors = array(
                'error_code' => '001',
                'error' => 'Unable To Write Data'
            );
            return $errors;
        }
    }
    
    function db_select_direct ($query) {
        global $dbcon;
        $result = $dbcon->query($query);
        if($result) {
            $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
            return $result;
        } else {
            $errors = array(
                'error_code' => '002',
                'error' => 'Unable To Retrieve Data'
            );
            return $errors;
        }
    }

    function db_multiple_select_direct($query) {
        global $dbcon;
        $result = $dbcon->query($query);
        if($result) {
            $dataArray = array();
            while($resultArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $dataArray[] = $resultArray;
            }
            return $dataArray;
        } else {
            $errors = array(
                'error_code' => '002',
                'error' => 'Unable To Retrieve Data'
            );
            return $errors;
        }
    }

    function db_select_secure($query, $params, $types) {
        global $dbcon;
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, $types, $params);
        if(mysqli_stmt_execute($q)) {
            $result = mysqli_stmt_get_result($q);
            $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
            return $result;
        } else {
            $errors = array(
                'error_code' => '002',
                'error' => 'Unable To Retrieve Data'
            );
            return $errors;
        }
    }

    function db_multiple_select_secure($query, $params, $types) {
        global $dbcon;
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, $types, $params);
        if(mysqli_stmt_execute($q)) {
            $result = mysqli_stmt_get_result($q);
            $dataArray = array();
            while($resultArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $dataArray[] = $resultArray;
            }
            return $dataArray;
        } else {
            $errors = array(
                'error_code' => '002',
                'error' => 'Unable To Retrieve Data'
            );
            return $errors;
        }
    }

    function db_update_direct($table_name, array $columns_new_data, array $referrence_column_data) {
        global $dbcon;
        $column = implode("", array_keys($columns_new_data));
        $new_value = implode("", array_values($columns_new_data));
        $ref_column = implode("", array_keys($referrence_column_data));
        $ref_columns_value = implode("", array_values($referrence_column_data));
        $query = 'UPDATE '.$table_name.' ';
        $query .= 'SET `'.$column.'` = '.$new_value.' ';
        $query .= 'WHERE `'.$ref_column.'` = "'.$ref_columns_value.'" ';
        $result = $dbcon->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    function db_update_secure($table_name, $column_to_update, $ref_column, $params, $types) {
        global $dbcon;
        $query = 'UPDATE '.$table_name.' SET `'.$column_to_update.'` = ? WHERE `'.$ref_column.'` = ?';
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, $types, $params);
        if(mysqli_stmt_execute($q)) {
            return true;
        } else {
            return false;
        }
    }

    function random_lc_alphabets ($min, $max) {
        $lc_alphabets = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'z');
        $randomlc = '';
        for($i = 0; $i < rand($min, $max); $i++) {
            $randomlc .= $lc_alphabets[rand(0, count($lc_alphabets)-1)];
        }
        return $randomlc;
    }

    function random_uc_alphabets ($min, $max) {
        $uc_alphabets = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Z');
        $randomuc = '';
        for($i = 0; $i < rand($min, $max); $i++) {
            $randomuc .= $uc_alphabets[rand(0, count($uc_alphabets)-1)];
        }
        return $randomuc;
    }

    function random_numbers ($min, $max) {
        $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '9');
        $randomn = '';
        for($i = 0; $i < rand($min, $max); $i++) {
            $randomn .= $numbers[rand(0, count($numbers)-1)];
        }
        return $randomn;
    }

    function generate_recovery_key ($dataTable) {
        $recovery_key = random_numbers(4, 6).random_uc_alphabets(8, 10);
        $recovery_key_check_result = db_select_secure("SELECT * FROM ".$dataTable." WHERE `recovery_key` = ?", $recovery_key, 's');

        while(isset($recovery_key_check_result['recovery_key']) && ($recovery_key_check_result['recovery_key'] === $recovery_key)) {

            $recovery_key = random_numbers(4, 6).random_uc_alphabets(8, 10);
            $recovery_key_check_result = db_select_secure("SELECT * FROM ".$dataTable." WHERE `recovery_key` = ?", $recovery_key, 's');

        }
        return $recovery_key;
    }

    function check_email_availability ($email, $dataTable) {
        $email_check_result = db_select_secure("SELECT * FROM `".DB_NAME."`.`".$dataTable."` WHERE `email` = ?", $email, 's');
        if(isset($email_check_result['email'])) {
            $status = array(
                'in_use' => true,
                'status_text' => 'Email already in use &times'
            );
        } else {
            $status = array(
                'in_use' => false,
                'status_text' => 'Email available &check;'
            );
        }
        return $status;
    }

    function bcrypt ($secret_key) {
        return password_hash($secret_key, PASSWORD_BCRYPT);
    }

?>