<?php 
    session_start();
    include_once 'config.php';
    $user_id = $_SESSION['unique_id'];
    $logout_mutation = mysqli_query($connection, "UPDATE users SET status='Offline' WHERE unique_id='{$user_id}'");
    if($logout_mutation){
        unset($_SESSION['unique_id']);
        echo 'Updated Succefully';
    }else{
        echo "NO";
    }