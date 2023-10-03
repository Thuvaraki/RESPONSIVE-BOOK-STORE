<?php
   include 'config.php';
   session_start();

   $user_id= $_SESSION['user_id'];

   if(!isset($user_id)){
    header('location:login.php');
   }

   if(isset($_POST['add_to_cart'])){

      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $product_quantity = $_POST['product_quantity'];
   
      $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
   
      if(mysqli_num_rows($check_cart_numbers) > 0){
         $message[] = 'already added to cart!';
      }else{
         mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
         $message[] = 'product added to cart!';
      }
   
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
   <?php
      include 'header.php';
   ?>

   <section class="home">
      <div class="content">
           <h3>Welcome to Bookly - Your Literary Paradise!</h3>
           <p>Discover a world of stories, knowledge, and imagination at Bookly, your premier destination for books of all genres. Whether you're an avid reader, a casual bookworm, or a literary explorer, our online bookstore offers a vast collection that caters to all tastes.</p>
           <a href="about.php" class="white-btn">Discover more</a>
      </div>
   </section>  

   <section class="products">
   <h1 class="title">New Books</h1>
   <div class="box-container">
      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">No products added yet!</p>';
      }
      ?>
   </div>
   <div class="load-more" style="margin-top: 2rem; text-align:center; margin-bottom:2rem">
      <a href="shop.php" class="option-btn">load more</a>
   </div>
</section>

<section class="about">
   <div class="flex">
      <div class="image">
        <img src="images/about-img.jpg" alt="">
      </div>
      <div class="content">
         <h3>About Us</h3>
         <p>Welcome to Bookly! At Bookly, our passion is connecting readers with the stories they love. We're more than just a bookshop;
             we're a community of book enthusiasts who believe in the magic of words. With a carefully curated selection of books across genres, 
             we're here to inspire, captivate, and fuel your imagination.</p>
         <a href="about.php" class="btn">Read More</a>
      </div>
   </div>
</section>

<section class="home-contact">
   <div class="content">
      <h3>Have Any Question?</h3>
      <p>Feel free to reach out to us if you have any questions, need assistance with book recommendations, or just want to chat about your favorite reads.
          Our team of book enthusiasts is here to help you explore the world of literature and provide you with the best reading experiences.</p>
      <p>Don't hesitate to contact us - your literary journey is our priority!"</p>
           
      <a href="contact.php" class="white-btn">Contact Us</a>
   </div>
</section>

  <?php
      include 'footer.php';
   ?>

   <script src="js/script.js"></script>
</body>
</html>