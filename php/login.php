<?php

    session_start();
    include_once('config.php');
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $get_user_query = mysqli_query($connection, "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'");
        if(mysqli_num_rows($get_user_query) > 0){
            $row = mysqli_fetch_assoc($get_user_query);
            $user_id = $row['unique_id'];
            $_SESSION['unique_id'] = $user_id;
            $update_status = mysqli_query($connection, "UPDATE users SET status='Active Now' WHERE unique_id='{$user_id}'");
            echo 'OK';
        }else{
            echo 'Password or username is wrong!';
        }
    }else{
        echo 'All fields are required';
    }
    