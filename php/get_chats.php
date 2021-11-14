<?php
    session_start();
    include_once 'config.php';
    if(isset($_SESSION['unique_id'])){
        $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
        $unique_id = mysqli_real_escape_string($connection, $_POST['unique_id']);
        $image = mysqli_query($connection, "SELECT image FROM users WHERE unique_id={$user_id}")->fetch_assoc();
        $get_messages_query = mysqli_query($connection, "SELECT * FROM chats WHERE (sender_id={$unique_id} AND receiver_id = {$user_id})
         OR (sender_id={$user_id} AND receiver_id = {$unique_id})");
        $messages_HTML = '';
        if($get_messages_query){
            while($message = mysqli_fetch_assoc($get_messages_query)){
                if($message['sender_id'] == $unique_id){
                    $messages_HTML .= '<div class="outgoing">
                    <div class="details">
                    '.$message["msg"].'
                    </div>
                    </div>';
                }else{
                    $messages_HTML .= '<div class="incoming">
                    <img src="php/images/'.$image['image'].'">
                    <div class="details">
                    '.$message["msg"].'
                    </div>
                    </div>';
                }
            }
            echo $messages_HTML;
        }else{
            echo '<div>Oh shit no messages available</div>';
        }
    }else{
        header('location: ../login.php');
    }