<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelyMart</title>
    <link rel="stylesheet" href="css/homeStyle.css">
</head>
<body>
    <div class="header" >
        <img src="img/Logo.png" class="logoBelyMart" onclick="window.open('/', '_self')">
        <input type="text" placeholder="Please log in first to enable search feature" class="searchBox">
        <h1 class="login-btn" onclick="window.open('/login', '_self')">Log in</h1>
    </div>
    <div class="main-content" onclick="loginFirst()">
        <script type="text/javascript">
          function loginFirst()
          {
            alert("Please Log in First");
            location.href='/login';
          }
        </script>
        <div class="electronics">
            <h1>Electronics</h1>
            <img src="img/Homepage/electronics.png" alt="">
        </div>
        <div class="groceries" >
            <h1>Groceries</h1>
            <img src="img/Homepage/groceries.png" alt="" >
        </div>
        <div class="sports">
            <h1>Sports</h1>
            <img src="img/Homepage/sports.png" alt="">
        </div>
        <div class="automotive">
            <h1>Automotive</h1>
            <img src="img/Homepage/automotive.png" alt="">
        </div>
        <div class="fashion">
            <h1>Fashion</h1>
            <img src="img/Homepage/fashion.png" alt="">
        </div>
        <div class="homeApplicances">
            <h1>Home Appliances</h1>
            <img src="img/Homepage/homeAppliances.png" alt="">
        </div>
        <div class="gaming">
            <h1>Gaming</h1>
            <img src="img/Homepage/gaming.png" alt="">
        </div>
        <div class="health">
            <h1>Health & Beauty</h1>
            <img src="img/Homepage/health.png" alt="">
        </div>
    </div>
</body>
</html>