<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelyMart</title>
    <link rel="stylesheet"  href="../css/allproductsStyle.css">
</head>
<body>
    <form class="header">
        <img src="../img/Logo.png" class="logoBelyMart" onclick="window.open('/homeLoggedIn', '_self')">
        <input type="text" placeholder="Search for product, brands and shops" class="searchBox" name="searchInput">
        <img src="../img/cart.png" alt="" class="cart-btn" onclick="window.open('/cart', '_self')">
        <h1 alt="" class="logout-btn" onclick="confirmLogout()">Logout</h1>
        <script type="text/javascript">
          function confirmLogout() {
            if (confirm("Are you sure to log out? "))
              location.href='/logout';
          }
      </script>
    </form>
    @php

    @endphp
    <div class="main-content">
      @if (count($products))          
        @foreach ($products as $product)
          <div class="card" onclick="window.open('/productView/{{$product->id}}', '_self')">
            <h1 class="productName">{{$product->name}}</h1>
            <img src="{{$product->linkImg1}}" alt="">
            <h1 class="productPrice">RM {{$product->price}}</h1>     
          </div>                        
        @endforeach
      @else
        <h1 style="color: red;text-align:center;font-size: 50px;">No Result found ☹️</h1>
      @endif
    </div>
    
</body>
</html>