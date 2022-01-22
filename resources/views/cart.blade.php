<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelyMart</title>
    <link rel="stylesheet" href="../css/cartStyle.css">
</head>
<body>
    <form class="header" action="/searchProducts" method="post">
        @csrf
        <img src="../img/Logo.png" class="logoBelyMart" onclick="window.open('/homeLoggedIn', '_self')">
        <input type="text" placeholder="Search for product, brands and shops" class="searchBox" name="searchInput">
        <script type="text/javascript">
            function confirmLogout()
            {
                  if (confirm("Are you sure to log out? "))
                       location.href='/logout';
            }
        </script>
    </form>
    <h1 style="font-family: Arial, Helvetica, sans-serif;position: relative; left: 90px; width: 300px; z-index: 0; background-color: transparent; top: 50px;opacity: 50%">Cart</h1>
    <div class="main-content"> 
        <?php
            if (isset($customerCart)) {
                foreach($customerCart as $cart) {
                    echo $cart;
                }
            }
        ?>
        <div class="columnTitle">
            <h1 class="productImageTitle">Product Image</h1>
            <h1 class="productNameTitle">Product Name</h1>
            <h1 class="productQuantityTitle">Quantity</h1>
            <h1 class="productPriceTitle">Price</h1>
            <h1 class="totalPriceTitle">Total</h1>
        </div>
        @php
            $totalPrice = 0;        
        @endphp
        @foreach ($customerCarts as $customerCart)
            <div class="column">
                <img src="{{$customerCart->linkImg}}" alt="" class="productImage">
                <h1 class="productName">{{$customerCart->name}}</h1>
                <h1 class="productQuantity">{{$customerCart->quantity}}</h1>
                <h1 class="productPrice">RM {{$customerCart->price}}</h1>
                <h1 class="totalPrice">RM {{$customerCart->totalAmount}}</h1>
                @php
                    $totalPrice = $totalPrice + $customerCart->totalAmount;
                @endphp
                <button class="clear-btn" onclick="window.open('/removeFromCart/{{$customerCart->id}}', '_self')">Clear</button>
            </div>               
        @endforeach
    </div>
    <div class="checkOut">
        <button class="checkOut-btn" onclick="window.open('/receipt', '_self')">Check Out</button>
        <h1></h1>
        <h1 class="productPrice">Total</h1>
        <h1 class="totalPrice">RM {{$totalPrice}}</h1>
        <h1></h1>
    </div>
</body>
</html>