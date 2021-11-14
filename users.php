<?php 
    session_start();
    include_once('layout.php');
    include_once('php/config.php');
    if(!isset($_SESSION['unique_id'])){
        header('location: login.php');
    }
?>

<body>
    <div class='card'>
        <header class="user-data">
            <?php 
               $get_user_query = mysqli_query($connection, "SELECT * FROM users WHERE unique_id='{$_SESSION['unique_id']}'");
               if(mysqli_num_rows($get_user_query) > 0){
                   $row = mysqli_fetch_assoc($get_user_query);
               } 
            ?>
            <img src="<?php echo 'php/images/'.$row['image']?>">
            <div class="user-name">
                <span><?php echo $row['fname']." ".$row['lname'];  ?></span>
                <span><?php echo $row['status']; ?></span>
            </div>
            <a href="login.php">Logout</a>
        </header>
        <section class='content'>
            <div class='search'>
                <input type="text" class='styled-input' placeholder="Enter name to search">
                <button class='styled-button'> <i class='fas fa-search'></i></button>
            </div>
            <div class="users-list">
            </div>
        </section>
    </div>
    <script src='javascript/users.js'></script>
</body>

</html>