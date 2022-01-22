<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelyMart</title>
    <link rel="stylesheet"  href="../css/allproductsStyle.css">
</head>
<body>
    <form class="header" action="/searchProducts" method="post">
      @csrf
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

    <?php
      if (isset($array)) {
        $products = $array[0];
        $category = $array[1];     
      }
    ?>
    .

    <div class="main-content">
        @foreach ($products as $product)
          @if ($product->category == $category)
            <div class="card" onclick="window.open('/productView/{{$product->id}}', '_self')">
              <h1 class="productName">{{$product->name}}</h1>
              <img src="{{$product->linkImg1}}" alt="">
              <h1 class="productPrice">RM {{$product->price}}</h1>     
            </div>                         
          @endif
        @endforeach
    </div>
    
</body>
</html>