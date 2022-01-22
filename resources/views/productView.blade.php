<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelyMart</title>
    <link rel="stylesheet" href="../css/productViewStyle.css">
</head>
<body>
    <form class="header" action="/searchProducts" method="post">
        @csrf
        <img src="../img/Logo.png" class="logoBelyMart" onclick="window.open('/homeLoggedIn', '_self')">
        <input type="text" placeholder="Search for product, brands and shops" class="searchBox" name="searchInput">
        <img src="../img/cart.png" alt="" class="cart-btn" onclick="window.open('/cart', '_self')">
        <h1 alt="" class="logout-btn" onclick="confirmLogout()">Logout</h1>
        <script type="text/javascript">
            function confirmLogout()
            {
                if (confirm("Are you sure to log out? "))
                   location.href='/logout';
            }
        </script>
    </form>
    <div class="slider">
        <div class="images">
            <input type="radio" name="slide" id="img1" checked>
            <input type="radio" name="slide" id="img2">
            <input type="radio" name="slide" id="img3">
            <input type="radio" name="slide" id="img4">

            <img src="{{$productDetails->linkImg1}}" class="m1" alt="img1">
            <img src="{{$productDetails->linkImg2}}" class="m2" alt="img2">
            <img src="{{$productDetails->linkImg3}}" class="m3" alt="img3">
        </div>
        <div class="dots">
            <label for="img1"></label>
            <label for="img2"></label>
            <label for="img3"></label>
        </div>
    </div>
    <div class="desc">
        <h1>Description</h1>
        <div class="desc-txt">
            <p1>{{$productDetails->description}}</p1>
        </div>
    </div>
    <div class="productDetails">
        <div class="productName">
            <h1>{{$productDetails->name}}</h1>
        </div>
        <div class="productPrice">RM {{$productDetails->price}}</div>
        
        <div class="productQuantity">
            <p1>Quantity</p1>
            <form class="quantityInput" action="/addToCart" method="POST">    
                @csrf            
                <button onclick="decrement()" type="button" class="decrement-btn">-</button>
                <input class="productIdInputSpace" value={{$productDetails->id}} type=number name="productId">
                <input class="quantityInputSpace" type=number name="quantity">
                <button onclick="increment()" type="button" class="increment-btn">+</button>
                <button class="addToCart" type="submit">Add to Cart</button>
            </form>
            <h1 class="productQuantitytxt">{{$productDetails->quantity}} more available !</h1> 
            <script>
            function increment() {
                document.querySelector('.quantityInputSpace').stepUp();
            }
            function decrement() {
                document.querySelector('.quantityInputSpace').stepDown();
            }
            </script>
        </div>
    </div>
    </div>
    
</body>

</html>