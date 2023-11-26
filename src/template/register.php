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
    
    <div class="registerContainer">
        <h2>Create your account!</h2>
        <form action="/handlers/registrationHandler.php" method="POST">
            <div>
                <input type="text" name="email" id="email" placeholder="email" required>
            </div>
            <div>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div>
                <input type="password" name="passwordCheck" id="passwordCheck" placeholder="Confirm password" required>
            </div>
            
            <div class="flex">
                <a href="?page=login">log in</a>
                <div>
                    <input type="submit" value="Register">
                </div>
            </div>
            <!-- <p>By signing up, you agree to the Terms of Service and Privacy Policy, including Cookie Use.</p> -->
            <p class="disclaimer">By signing up, you agree to the <span class="accent">Terms of Service</span> and <span class="accent">Privacy Policy</span>, including <span class="accent">Cookie Use</span>.</p>
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
<?php 
// require_once('../handlers/registrationHandler.php');