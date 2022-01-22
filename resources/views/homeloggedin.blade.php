<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelyMart</title>
    <link rel="stylesheet" href="css/homeLoggedInStyle.css">
</head>
<body>
    <form class="header" action="/searchProducts" method="post">
        @csrf
        <img src="img/Logo.png" class="logoBelyMart" onclick="window.open('/homeLoggedIn', '_self')">
        <input type="text" placeholder="Search for product, brands and shops" class="searchBox" name="searchInput">
        <img src="img/cart.png" alt="" class="cart-btn" onclick="window.open('/cart', '_self')">
        <h1 class="logout-btn" onclick="confirmLogout()">Logout</h1>
        <script type="text/javascript">
            function confirmLogout()
            {
                if (confirm("Are you sure to log out? "))
                   location.href='/logout';
            }
        </script>
    </form>
    <div class="main-content">
        <div class="electronics" onclick="window.open('/allproducts/electronics', '_self')">
            <h1>Electronics</h1>
            <img src="img/Homepage/electronics.png" alt="">
        </div>
        <div class="groceries" onclick="window.open('/allproducts/groceries', '_self')">
            <h1>Groceries</h1>
            <img src="img/Homepage/groceries.png">
        </div>
        <div class="sports" onclick="window.open('/allproducts/sports', '_self')">    
            <h1>Sports</h1>
            <img src="img/Homepage/sports.png" alt="">
        </div>
        <div class="automotive" onclick="window.open('/allproducts/automotives', '_self')">
            <h1>Automotive</h1>
            <img src="img/Homepage/automotive.png" alt="">
        </div>
        <div class="fashion" onclick="window.open('/allproducts/fashions', '_self')">
            <h1>Fashion</h1>
            <img src="img/Homepage/fashion.png" alt="">
        </div>
        <div class="homeApplicances" onclick="window.open('/allproducts/homeappliances', '_self')">
            <h1>Home Appliances</h1>
            <img src="img/Homepage/homeAppliances.png" alt="">
        </div>
        <div class="gaming" onclick="window.open('/allproducts/gaming', '_self')">
            <h1>Gaming</h1>
            <img src="img/Homepage/gaming.png" alt="">
        </div>
        <div class="health" onclick="window.open('/allproducts/health', '_self')">
            <h1>Health & Beauty</h1>
            <img src="img/Homepage/health.png" alt="">
        </div>
    </div>
</body>
</html>