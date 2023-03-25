<?php

    require_once('../../config.php');
    require_once('../../functions.php');

    if (isset($_POST)) {

        if (isset($_POST['fullname'])) $fullname = sanitizeString($_POST['fullname']);
        if (isset($_POST['email'])) $email = sanitizeEmail($_POST['email']);
        if (isset($_POST['phonenumber'])) $phonenumber = sanitizeString($_POST['phonenumber']);
        if (isset($_POST['message'])) $message = sanitizeString($_POST['message']);

        $errors = array();

        if (empty($fullname)) $errors[] = 'Fullname Missing';
        if (empty($email)) $errors[] = 'Email Missing';
        if (empty($phonenumber)) $errors[] = 'Phone Number Missing';
        if (!(empty($email)) && !(validateEmail($email))) $errors[] = 'Email address is invalid, check it and try again';
        if (empty($message)) $errors[] = 'Message Missing';

        if(empty($errors)) {

            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'phonenumber' => $phonenumber,
                'message' => $message
            );

            $insert_result = db_insert('messages', $data);

            if($insert_result == true) {

                $responseData = array(
                    'status' => '00',
                    'message' => 'Message SUCCESSFULLY Sent, You will recieve a response'
                );
    
                echo json_encode($responseData);

            } else if($insert_result !== true) {

                $responseData = array(
                    'status' => '01',
                    'message' => 'Unable To Send Message, Try Again'
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