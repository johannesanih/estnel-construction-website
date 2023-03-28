<?php

    require_once('../../config.php');
    require_once('../../functions.php');

    if (isset($_POST)) {

        if (isset($_POST['email'])) $email = sanitizeEmail($_POST['email']);
        if (isset($_POST['password'])) $password = sanitizeString($_POST['password']);

        $errors = array();

        if (empty($email)) $errors[] = 'Email Missing';
        if (!(empty($email)) && !(validateEmail($email))) $errors[] = 'Email address is invalid, check it and try again';
        if (empty($password)) $errors[] = 'Password Missing';

        if(empty($errors)) {

            $data = array(
                'email' => $email,
                'password' => $password,
            );

            $select_data = db_multiple_select_direct("SELECT * FROM `".DB_NAME."`.`admin_users` WHERE `email` = '".$email."'");
            if($select_data) {
                if(password_verify($password, $select_data[0]['password'])) {
                    startSession(array(
                        'id' => $select_data[0]['id'],
                        'admin_name' => $select_data[0]['admin_name'],
                        'admin_email' => $select_data[0]['email'],
                        'admin_active' => $select_data[0]['active']
                    ));

                    $responseData = array(
                        'status' => '00',
                        'message' => 'Sign In SUCCESSFUL'
                    );
        
                    echo json_encode($responseData);
                } else {
                    $responseData = array(
                        'status' => '01',
                        'message' => 'Password is Incorrect'
                    );
        
                    echo json_encode($responseData);
                }
            } else {
                $responseData = array(
                    'status' => '01',
                    'message' => 'Unable To Retrieve Any Admin Account With That Email'
                );
    
                echo json_encode($responseData);
            }

        } else {

            $errorMsg = '<ol>';
            foreach($errors as $error) {
                $errorMsg .= '<li>'.$error.'</li>';
            }
            $errorMsg .= '</ol>';

            $responseData = array(
                'status' => '01',
                'message' => $errorMsg
            );

            echo json_encode($responseData);

        }

    }

?>