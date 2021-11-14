<?php 
    session_start();
    include_once 'config.php';
    $unique_id = $_SESSION['unique_id'];
    $get_all_users_QUERY = mysqli_query($connection, "SELECT * FROM users WHERE NOT unique_id = {$_SESSION['unique_id']}");
    if(mysqli_num_rows($get_all_users_QUERY) == 1){
        echo 'NO';
    }else{
        $data = '';
        while($row = mysqli_fetch_assoc($get_all_users_QUERY)){
            $last_message_query = mysqli_query($connection, "SELECT * FROM chats WHERE (sender_id={$unique_id} AND receiver_id = {$row['unique_id']})
            OR (sender_id={$row['unique_id']} AND receiver_id = {$unique_id}) ORDER BY msg_id DESC")->fetch_assoc();
            if(!$last_message_query){
                $last_message = 'No message Exchange';
            }elseif($last_message_query['sender_id'] == $unique_id){
                $last_message = 'You: '.$last_message_query['msg'];
            }else{
                $last_message = $last_message_query['msg'];
            }
            $hide = 'block';
            if($row['status'] == 'Offline'){
                $hide = 'none';
            }
            $data .= "<a class='user-link' href='chats.php?user_id=".$row['unique_id']."'>
                        <div class='user-data'>
                            <img src='php/images/{$row['image']}'>
                            <div class='user-name'>
                                <span>{$row['fname']} {$row['lname']}</span>
                                <span>{$last_message}</span>
                            </div>
                            <span style='display:".$hide.";'></span>
                        </div>
                    </a>";
            
        };
        echo $data;
    }