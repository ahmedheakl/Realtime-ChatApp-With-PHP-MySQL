<?php

    include_once 'config.php';
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
    $unique_id = mysqli_real_escape_string($connection, $_POST['unique_id']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);

    $insert_message_query = mysqli_query($connection, "INSERT INTO chats (sender_id, receiver_id, msg)
                                     VALUES ({$unique_id}, {$user_id}, '{$message}')");

    if($insert_message_query){
        echo 'OK';
    }
                           