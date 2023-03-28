<?php

    require_once('../../config.php');
    require_once('../../functions.php');

    if (isset($_POST)) {

        if (isset($_POST['fullname'])) $fullname = sanitizeString($_POST['fullname']);
        if (isset($_POST['email'])) $email = sanitizeEmail($_POST['email']);
        if (isset($_POST['password'])) $password = sanitizeString($_POST['password']);
        if (isset($_POST['c_password'])) $c_password = sanitizeString($_POST['c_password']);
        

        $errors = array();

        if (empty($fullname)) $errors[] = 'Fullname Missing';
        if (empty($email)) $errors[] = 'Email Missing';
        if (!(empty($email)) && !(validateEmail($email))) $errors[] = 'Email address is invalid, check it and try again';
        if (empty($password)) $errors[] = 'Password Missing';
        if (empty($c_password)) $errors[] = 'Please Confirm password';
        if (($c_password !== $password) && !(empty($c_password))) $errors[] = 'Password are not the dame, Check and Confirm Password Properly';

        if(empty($errors)) {

            $emailAvailableStatus = check_email_availability($email, 'admin_users');

            if($emailAvailableStatus['in_use']) {
                $responseData = array(
                    'status' => '01',
                    'message' => $emailAvailableStatus['status_text']
                );
    
                echo json_encode($responseData);
            } else {
                $data = array(
                    'admin_name' => $fullname,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'active' => 'yes'
                );

                $insert_result = db_insert('admin_users', $data);

                if($insert_result == true) {

                    $responseData = array(
                        'status' => '00',
                        'message' => 'Admin Account created SUCESSFULLY<br><a href="signin.php" class="m-3 d-block text-center btn btn-lg btn-danger">Now Sign In</a>'
                    );
        
                    echo json_encode($responseData);

                } else if($insert_result !== true) {

                    $responseData = array(
                        'status' => '01',
                        'message' => 'Unable To Create Admin Account'
                    );
        
                    echo json_encode($responseData);
                }
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