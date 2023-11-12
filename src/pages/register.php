<div class="loginWrapper">
    <div class="info">
        <h1>Lantrn</h1>
        <p>Join your friends today and stay up to date with the latest news, fashion, memes, trends and much more!</p>
    </div>    
    <div class="registerContainer">
        
        <h2>Register now!</h2>
        
        <form action="login.php" method="POST">
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
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" required>
            </div>
            
            <div class="flex">
                <a href="?page=login">log in here</a>
                <div>
                    <input type="submit" value="Register">
                </div>
            </div>
        </form>
    </div>
</div>