<?php 
    include_once('layout.php');
?>

<body>
    <div class='card'>
        <header class="header-data">
            Realtime Chat App
        </header>
        <div class="error-message"></div>
        <form class='form login' action="#" method="GET">
            <div class="field">
                <label>Email</label>
                <input type="email" name='email' placeholder="Enter your email" required>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name='password' placeholder="Enter your password" required>
                <i class="fas fa-eye show-tag"></i>
            </div>
            <button type='submit'>
                <h3>Login</h3>
            </button>
        </form>
        <span>
            Not Signed up yet?
            <a href="index.php">SignUp</a></span>
    </div>
    <script src='javascript/login.js'></script>
    <script src='javascript/show_password.js'></script>
</body>

</html>