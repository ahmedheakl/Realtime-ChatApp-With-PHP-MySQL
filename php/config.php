<?php 

    $connection = mysqli_connect('localhost', 'root', '', 'chat');
    if(!$connection){
        echo 'Error occured';
    }

?>