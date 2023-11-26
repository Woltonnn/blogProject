<?php
require_once('../functions/ini.php');
require_once('../functions/account.php');
$accountHandler = new accountHandler;
?>
<div class="wrapper">
    <div class="info">
        <h1>Lantrn</h1>
        <p>Join your friends today and stay up to date with the latest news, fashion, memes, trends and much more!</p>
    </div>  

    <div class="loginContainer">
        <h2>Login</h2>
        <form action="/handlers/loginHandler.php" method="POST">
            <div>
                <input type="text" name="user" id="user" placeholder="Username / Email" required>
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="flex">
                <div>
                    <input type="submit" value="Login">
                </div>
                <a href="?page=register">Create account</a>
            </div>
            <?php
                $accountHandler->showErrors();
            ?>
        </form>
    </div>
</div>

<div class="footer">
    <a href="#">About</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Terms of service</a>
    <a href="#">info</a>
    <a href="#">FAQ</a>
    <span class="copyright">&copy;2023 Christian Woltinge</span>
</div>