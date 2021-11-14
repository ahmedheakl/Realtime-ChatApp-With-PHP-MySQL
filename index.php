<?php 
    include_once('layout.php');
?>

<body>
    <div class='card'>
        <header class='header-data'>
            Realtime Chat App
        </header>
        <div class="error-message"></div>
        <form class='form' action="" method='POST' enctype="multipart/form-data">
            <div class="user-name-data">
                <div class="field">
                    <label>First Name</label>
                    <input type="text" name='fname' placeholder="First Name..." required>
                </div>
                <div class="field">
                    <label>Last Name</label>
                    <input type="text" name='lname' placeholder="Last Name..." required>
                </div>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name='email' placeholder="Enter your email" required>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name='password' placeholder="Enter a new password" required>
                <i class="fas fa-eye show-tag"></i>
            </div>
            <div class="field">
                <label>Your Image</label>
                <input type="file" name='image'>
            </div>
            <button type='submit'>
                <h3>Register</h3>
            </button>
        </form>
        <span>
            Signed up already?
            <a href="login.php">Login</a></span>
    </div>
    <script src='javascript/signup.js'></script>
    <script src='javascript/show_password.js'></script>
</body>

</html>