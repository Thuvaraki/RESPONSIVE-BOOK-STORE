<?php
   include 'config.php';
   session_start();

   $user_id= $_SESSION['user_id'];

   if(!isset($user_id)){
    header('location:login.php');
   }

   if(isset($_POST['update_cart'])){
      $cart_id=$_POST['cart_id'];
      $cart_quantity = isset($_POST['cart_quantity']) ? $_POST['cart_quantity'] : null;

      mysqli_query($conn,"UPDATE `cart` SET quantity='$cart_quantity' WHERE id='$cart_id'") or die('query failed');
      $message[]='cart  quantity updated!';
   }

   if(isset($_POST['delete'])){
      $cart_id=$_POST['cart_id'];
      
      mysqli_query($conn, "DELETE FROM `cart` WHERE id='$cart_id'") or die('query failed');
      $message[]='Product removed successfully';
   }

   if(isset($_GET['delete_all'])){
      mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      header('location:cart.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cart</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
   <?php
      include 'header.php';
   ?>

   <div class="heading">
       <h3>Shopping cart</h3>
       <p><a href="home.php">home</a>/contact</p>
   </div>
   <?php
   $grand_total=0;
   ?>

   <section class="shopping-cart">
      <h1 class="title">Products added</h1>
         <div class="box-container">
            <?php
               $select_cart=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query_failed');
               if(mysqli_num_rows($select_cart)>0){
                  while($fetch_cart=mysqli_fetch_assoc($select_cart)){
            ?>
            <div class="box">
               <img src="uploaded_img/<?php echo $fetch_cart['image'];?>" alt="">
               <div class="name"><?php echo $fetch_cart['name'];?></div>
               <div class="price">Rs <?php echo $fetch_cart['price'];?>/-</div>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id'];?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity'];?>">
                  <div class="button">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
                  <input type="submit" name="delete" value="delete" class="delete-btn">
                  </div>                 
               </form>
               <div class="sub-total"> sub total : <span>Rs  <?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-
                  </span> </div>
               <?php
                  $grand_total += $sub_total;
                ?>
             </div>
             <?php
         }
      }
               else{
               echo'<p class="empty">Your cart is empty!</p>';
              }
            ?>
         </div>

         <div style="margin-top: 2rem; text-align:center;">
           <form action="" method="get">
              <input type="submit" name="delete_all" value="Delete All" class="delete-btn" onclick="return confirm('delete all from cart?');">
           </form>
         </div>

          <div class="cart-total">
              <p>grand total : <span>Rs <?php echo $grand_total; ?>/-</span></p>
              <div class="flex">
               <a href="shop.php" class="option-btn">continue shopping</a>
               <?php
                   if ($grand_total > 0) {
                        echo '<a href="checkout.php" class="btn">Proceed to checkout</a>';
                   }
               ?>
          </div>
      </div>
   </section>

 
   <?php
      include 'footer.php';
   ?>

   <script src="js/script.js"></script>
</body>
</html>