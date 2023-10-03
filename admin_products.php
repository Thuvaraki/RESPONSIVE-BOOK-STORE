<?php
   include 'config.php';
   session_start();

   $admin_id= $_SESSION['admin_id'];

   if(!isset($admin_id)){
    header('location:login.php');
   };

   if(isset($_POST['add_product'])){
    // $name = mysqli_real_escape_string($conn,$_POST['name']); here,$conn: This argument represents the database connection object, which is required by
    // mysqli_real_escape_string to determine the character set and encoding of the database. It tells the function how to properly escape characters based
    // on the database connection's settings.
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    // gets the temporary name/location of the uploaded image file on the server.
    $image_tmp_name = $_FILES['image']['tmp_name'];
    // specifies the folder where the uploaded image will be stored, combining it with the original filename.
    $image_folder = 'uploaded_img/'.$image;
    
    $select_product_name= mysqli_query($conn,"SELECT name FROM `PRODUCTS` WHERE name='$name'")or die('query failed');

    if(mysqli_num_rows($select_product_name)>0){
       $message[]='product name already added';
    }
    else{
        $add_product_query = mysqli_query($conn,"INSERT INTO `PRODUCTS`(name,price,image) values('$name','$price','$image')") or die('query failed');

        if($add_product_query){
            if($image_size > 2000000){
               $message[] = 'image size is too large';
            }else{
                 // move_uploaded_file($image_tmp_name, $image_folder);: This line is responsible for moving the uploaded image file from its temporary location
                 // on the server (specified by $image_tmp_name) to the intended folder where it should be stored (specified by $image_folder).
                // This function, move_uploaded_file, is commonly used for handling file uploads in PHP. It takes two arguments:
               //  $image_tmp_name: The temporary name and location of the uploaded file on the server.
               // $image_folder: The destination folder and the desired filename for storing the uploaded file.
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'product added successfully!';
            }
         }else{
            $message[] = 'product could not be added!';
         }
    }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    // unlink function is used to delete the image file from the 'uploaded_img' directory
    unlink('uploaded_img/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed'); // to delete the product record from the 'products' table 
    header('location:admin_products.php');
 }
 
 if(isset($_POST['update_product'])){
 
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
 
    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');
 
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_img/'.$update_image;
    $update_old_image = $_POST['update_old_image'];
 
    if(!empty($update_image)){
       if($update_image_size > 2000000){
          $message[] = 'image file size is too large';
       }else{
          mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
          move_uploaded_file($update_image_tmp_name, $update_folder);
          unlink('uploaded_img/'.$update_old_image);
       }
    }
 
    header('location:admin_products.php');
 
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <link rel="stylesheet" href="css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <?php
    include 'admin_header.php';
    ?>

    <!-- product CRUD section starts -->
    
       <section class="add-products">
        <h1 class="title">shop products</h1>
        <!-- enctype attribute specifies the encoding type for the form data. When handling file uploads,  use "multipart/form-data" as the value of enctype. 
        This encoding is suitable for sending binary data, such as files, as part of the form submission. -->
        <form action="" method="post" enctype="multipart/form-data">
            <h3>add product</h3>
            <input type="text" name="name" class="box" placeholder="Enter your product name" required>
            <input type="number" min="0" name="price" class="box" placeholder="Enter product price" required>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
            <input type="submit" value="add product" name="add_product" class="btn">
        </form>
       </section>
    <!-- product CRUD section ends -->

    <!-- show products -->
    <section class="show-products">
          <div class="box-container">
            <?php
             $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
             if(mysqli_num_rows($select_products) > 0){
             while($fetch_products = mysqli_fetch_assoc($select_products)){
             ?>
          <div class="box">
               <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
               <div class="name"><?php echo $fetch_products['name']; ?></div>
               <div class="price">Rs <?php echo $fetch_products['price']; ?>/-</div>
               <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
               <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
         </div>
             <?php
              }
              }else{
                 echo '<p class="empty">no products added yet!</p>';
                }
              ?>
         </div>
    </section>

    <!-- update products -->
    <section class="edit-product-form">
          <?php
            if(isset($_GET['update'])){
                $update_id = $_GET['update'];
                $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
                if(mysqli_num_rows($update_query) > 0){
                    while($fetch_update = mysqli_fetch_assoc($update_query)){
          ?>
           <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
               <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
               <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
               <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
               <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
               <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
               <input type="submit" value="update" name="update_product" class="btn">
               <input type="reset" value="cancel" id="close-update" class="option-btn">
               <!-- When a user clicks this "cancel" button, it triggers the form's reset behavior. This means that all the form fields 
               (including text fields, checkboxes, and radio buttons) will be cleared or reset to their initial values, 
               which were set when the form was initially loaded or rendered -->
               <!-- The <input type="reset"> element is a standard HTML form control and doesn't require any JavaScript or additional programming to function.
                It simply performs a browser-level operation to reset form fields. -->
           </form>
          <?php
             }
            }
           }else{
               echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
           }
          ?>
    </section>



    <script src="js/admin_script.js"></script>
</body>
</html>