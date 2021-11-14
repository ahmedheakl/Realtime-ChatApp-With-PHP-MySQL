<?php
    session_start();
    include_once 'config.php';
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    define("VALID_TYPES", array('jpg', 'jpeg', 'png'));
    
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $users_query = mysqli_query($connection, "SELECT email FROM users WHERE email='{$email}'");
            if(mysqli_num_rows($users_query) > 0){
                echo 'Email Already Taken';
            }else{
                $image_type = explode('/', $_FILES['image']['type'])[1];
                if(in_array($image_type, VALID_TYPES)){
                    $image_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $current_time = time();
                    $new_image_name = $current_time.$image_name;
                    if(move_uploaded_file($tmp_name, 'images/'.$new_image_name)){
                        $status = 'Active Now';
                        $random_id = rand($current_time, 10000000);

                        $insert_query = mysqli_query($connection, "INSERT INTO users
                         (unique_id, fname, lname, email, password, image, status)
                          VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')");
                        if($insert_query){
                            $get_user_query = mysqli_query($connection, "SELECT * FROM users WHERE email='{$email}'");
                            if(mysqli_num_rows($get_user_query) > 0){
                                $row = mysqli_fetch_assoc($get_user_query);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo 'OK';
                            }else{
                                echo 'Error Occured';
                            }
                        }
                    }
                    ;
                }else{
                    $types = implode(', ', VALID_TYPES);
                    echo 'Enter a valid image type: '.$types;
                }
                
                
            }
        }else{
            echo 'Please enter a valid email';
        }
    }else{
        echo 'All inputs are required';
    }

?>