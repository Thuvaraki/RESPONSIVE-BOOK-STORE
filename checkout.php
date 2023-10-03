<?php
   include 'config.php';
   session_start();

   $user_id= $_SESSION['user_id'];

   if(!isset($user_id)){
    header('location:login.php');
   }

   if(isset($_POST['order-btn'])){

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $number = mysqli_real_escape_string($conn, $_POST['number']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $method = mysqli_real_escape_string($conn, $_POST['method']);
      $address = mysqli_real_escape_string($conn,$_POST['address']);
      $placed_on = date('d-M-Y');
   
      // Initialize variables for cart total and cart products.
      $cart_total = 0;
      $cart_products[] = '';
   
      $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($cart_query) > 0){
         while($cart_item = mysqli_fetch_assoc($cart_query)){
            // Build an array of cart products and calculate subtotals.
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
         }
      }
   
      // Combine cart products into a comma-separated string.
      $total_products = implode(', ',$cart_products);
   
      // Check if an order with the same details already exists in the database.
      $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');
   
      if($cart_total == 0){
         $message[] = 'your cart is empty';
      }else{
         if(mysqli_num_rows($order_query) > 0){
            $message[] = 'order already placed!'; 
         }else{
            mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
            $message[] = 'order placed successfully!';
            mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         }
      }
      
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
   <?php
      include 'header.php';
   ?>

   <div class="heading">
       <h3>checkout</h3>
       <p><a href="home.php">home</a>/checkout</p>
   </div>

   <section class="display-order">
   <h1 class="title">Checkout items</h1>
   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <!-- <p> tag is used to create a block element for each item in the cart. -->
   <p><?php echo $fetch_cart['name']; ?> <span>(<?php echo 'Rs '.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span></p>
   <?php
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> grand total : <span>Rs <?php echo $grand_total; ?>/-</span> </div>
   </section>

   <section class="checkout">
      <form action="" method="post">
           <h3 class="title">Place your order</h3>
           <div class="flex">
              <div class="input-box">
                <span>Your name:</span>
                <input type="text" name="name" required placeholder="Enter your name">
              </div>
              <div class="input-box">
                <span>Your number:</span>
                <input type="number" name="number" required placeholder="Enter your number">
              </div>
              <div class="input-box">
                <span>Your email:</span>
                <input type="email" name="email" required placeholder="Enter your email">
              </div>
              <div class="input-box">
                <span>Payment method:</span>
                <select name="method">
                  <option value="Cash on delivery">Cash on delivery</option>
                  <option value="Credit card">Credit card</option>
                </select>
              </div>
              <div class="input-box">
                <span>Address:</span>
                <input type="text" name="address" required placeholder="Enter your address">
              </div>
            </div>
              <input type="submit" value="order now" class="btn" name="order-btn">
      </form>
   </section>

   <?php
      include 'footer.php';
   ?>

   <script src="js/script.js"></script>
</body>
</html>