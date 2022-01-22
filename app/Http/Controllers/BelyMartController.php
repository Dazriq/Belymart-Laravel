<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\ProductList;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Seller;
use App\Models\Session;

global $userIdGlobal;

class BelyMartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index() {
        return view('home');
    }

    public function homeLoggedIn() {
        return view('homeLoggedIn');
    }

    public function login() {
        return view('login');
    }

    public function logout() {
        return view('home');
    }

    public function signup() {
        return view('signup');
    }

    public function searchProducts(Request $request) {
        $input = $request->input();
        $searchInput = $input['searchInput'];

        $result = array();
        $products = Product::all();
        foreach($products as $product) {
            if (strtolower($searchInput) == strtolower($product->name)) {
                array_push($result, $product);
            }
        }
        return view('searchResult')->with('products', $result);
    }

    public function allproducts($category) {
        $products = Product::all();
        $array =  array($products, $category);
        return view('allproducts')->with('array', $array);
    }

    public function productView($productId) {
        $productDetails = Product::find($productId);
        return view('productView')->with('productDetails', $productDetails);
    }

    public function addToCart(Request $request) {

        $quantity = $request->quantity;
        $productId = $request->productId;
        if ($quantity == 0) {
            echo '<script>alert("Quantity cannot be 0")</script>'; 
            return $this->productView($productId);
        }
        else {
            
            $sessions = Session::all();
            foreach ($sessions as $session) {
                $customerId = $session->UserId;
            }
            
            $product = Product::find($productId);
            
            $cart = new Cart;
            $cart->userId = $customerId;
            $cart->productId = $productId;
            $cart->quantity = $quantity;
            $cart->totalAmount = $product->price * $quantity;
            $cart->name = $product->name;
            $cart->price = $product->price;

            $product = Product::find($productId);
            $cart->linkImg = $product->linkImg1;
            
            $cart->save();

            $product->quantity = $product->quantity - $quantity;
            $product->save();

            echo '<script>alert("Item Added to Cart")</script>'; 
            return view('homeLoggedIn');
        }
    }

    public function authenticate(Request $request) {
        $data = $request->input();  

        $userName = $data['userName'];
        $password = $data['password'];

        $customers = Customer::all();

        $userNameBool = false;
        $passwordBool = false;

        foreach($customers as $customer) {
            if ($customer->name == $userName) {
                $userNameBool = true;
            }
            if ($customer->password == $password) {
                $passwordBool = true;
            }
        }

        if ($userNameBool == true and $passwordBool == true) {
            foreach($customers as $customer) {
                if ($customer->name == $userName && $customer->password == $password) {
                    Session::truncate();
                    $session = new Session;
                    $session->userId = $customer->id;
                    $session->save();
                    return view('/homeloggedIn');
                }
            }
        }

        else {
            $errorMessage = "";
            if ($userNameBool == false) {
                $errorMessage = $errorMessage . "Wrong Username<br>";
            }
            if ($userNameBool == false) {
                $errorMessage = $errorMessage . "Wrong Password";
            }
            return view('/login')->with('errorMessage', $errorMessage);
        }
    }

    public function cart() {

        $sessions = Session::all();
        foreach ($sessions as $memu) {
            $customerId = $memu;
        }
        $customerId =  $customerId->UserId;
        $customerCarts = array();
        
        $carts = Cart::all();
        foreach($carts as $cart) {
            if ($cart->userId == $customerId) {
                array_push($customerCarts, $cart);
            }
        }

        return view('cart')->with('customerCarts', $customerCarts);
    }

    public function removeFromCart($cartId) {
        $cart = Cart::find($cartId);
        $product = Product::find($cart->productId);
        $product->quantity = $product->quantity + $cart->quantity;
        $product->save();
        
        $cart->delete();
        return $this->cart();
    }

    public function createAccount(Request $request) {
        $data = $request->input();

        $userName = $data['userName'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];

        $customers = Customer::all();

        if ($password == $confirmPassword) {
            $customer = new Customer;
            $customer->name = $userName;
            $customer->password = $password;
            $customer->save();
            $accountCreatedMsg = "account has been created";
            return view('login')->with('accountCreatedMsg', $accountCreatedMsg);
        }
        else {
            $errorMessage = "Passwords doesn't match";
            return view('signup')->with('errorMessage', $errorMessage);
        }
    }

    public function receipt() {
        $sessions = Session::all();
        foreach ($sessions as $memu) {
            $customerId = $memu;
        }
        $customerId =  $customerId->UserId;
        $customerCarts = array();
        
        $carts = Cart::all();
        foreach($carts as $cart) {
            if ($cart->userId == $customerId) {
                array_push($customerCarts, $cart);
            }
        }

        return view('receipt')->with('customerCarts', $customerCarts);;
    }

    public function pay() {
        $sessions = Session::all();
        foreach ($sessions as $memu) {
            $customerId = $memu;
        }
        $customerId =  $customerId->UserId;

        $carts = Cart::all();
        $totalPrice = 0;
        foreach($carts as $cart) {
            if ($cart->userId == $customerId) {
                $totalPrice = $totalPrice + $cart->totalAmount;
                $cart->delete();
            }
        }

        $payment = new Payment;
        $payment->userId = $customerId;
        $payment->amount = $totalPrice;
        $payment->created_at = date('Y-m-d H:i:s');
        $payment->save();

        echo '<script>alert("Thank you for you purchase! 😊 ")</script>'; 
        return view('homeLoggedIn');
    }

    public function cancelPay() {
        return view('homeLoggedIn');
    }
}