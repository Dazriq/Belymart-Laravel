<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelyMart</title>
    <link rel="stylesheet" href="css/signUpStyle.css">
</head>
<body>
    <div class="illustration">
        <img src="img/Logo.png" class="logo">
        <img src="img/Girl Phone.png" class="girl-img">
    </div>
    <form class="login" action="/createaccount" method="POST">
        @csrf
        <h1 class=signup-txt>Sign up</h1>
        <input type="text" placeholder="Username" class="username-input" name="userName">
        <input type="password" placeholder="Password" class="password-input" name="password">
        <input type="password" placeholder="Confirmation Password" class="confirmationPassword-input" name="confirmPassword">
        <button class="signup-btn" type="submit">Sign Up</button>
    </form>
    <?php
        if (isset($errorMessage)) {
            echo "<p1 class='error-msg'>$errorMessage</p1>";
        }    
    ?>
    <h1 class="haveAnAccount">Have an account? </h1>
    <h1 class="login-txt">Log in</h1>
</body>
</html>