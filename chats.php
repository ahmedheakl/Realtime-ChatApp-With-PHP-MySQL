<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header('location: login.php');
    }
    include_once('layout.php');
    include_once 'php/config.php';
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $unique_id = $_SESSION['unique_id'];

    $query = mysqli_query($connection, "SELECT * FROM users WHERE unique_id='{$user_id}'");
    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_assoc($query);
    }
    
?>

<body>
    <div class='card chat-card'>
        <header class="user-data chats-user-data">
            <a class='back-link' href="users.php"><i class="fas fa-long-arrow-alt-left"></i></a>
            <img src="php/images/<?php echo $user['image']?>">

            <div class="user-name">
                <span><?php echo $user['fname']." ".$user['lname']; ?></span>
                <span><?php echo $user['status']; ?></span>
            </div>
        </header>
        <section class='chat-box'>

        </section>
        <form class='send-message-form' action="#">
            <input type='text' name='unique_id' value='<?php echo $unique_id; ?>' hidden>
            <input type='text' name='user_id' value='<?php echo $user_id; ?>' hidden>
            <input type='text' name='message' class='styled-input' placeholder="Send a message.." required>
            <button class='styled-button' type="submit"><i class="fas fa-paper-plane"></i></button>
            <div class="dropdown">
                <div class="dropdown-content">
                    <a>💖</a>
                    <a>💙</a>
                    <a>😎</a>
                    <a>😃</a>
                    <a>😍</a>
                    <a>🤩</a>
                    <a>🤨</a>
                    <a>😢</a>
                    <a>😱</a>
                    <a>😐</a>
                </div>
                <button class="dropbtn" type='button'>Emoji <img src='imgs/main_emoji.jpg'></button>

            </div>
        </form>

    </div>
    <script src="javascript/chats.js"></script>
    <script src='javascript/emojis.js'></script>
</body>

</html>