<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelyMart</title>
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
    <div class="illustration"> 
        <img src="img/Logo.png" class="logo" onclick="window.open('index.html', '_self')">
        <img src="img/Girl Phone.png" class="girl-img">
    </div>
    <form class="login" action="/authenticate" method="POST">
        @csrf
        <h1 class=login-txt>Log in</h1>
        <input type="text" placeholder="Username" class="username-input" name="userName">
        <input type="password" placeholder="Password" class="password-input" name="password">
        <button class="login-btn" type="submit">Log in</button>
    </form>
        <?php
            if (isset($errorMessage)) {
                echo "<p1 class='error-msg'>$errorMessage</p1>";
            }    
        ?>
        <?php
            if (isset($accountCreatedMsg)) {
                echo "<script type='text/javascript'>alert('$accountCreatedMsg');</script>";
            }    
        ?>
        <h1 class="or-txt">OR</h1>
        <button class="signup-btn" onclick="window.open('/signup', '_self')">Sign Up</button>
</body>
</html>