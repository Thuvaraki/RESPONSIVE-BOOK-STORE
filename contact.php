<?php
   include 'config.php';
   session_start();

   $user_id= $_SESSION['user_id'];

   if(!isset($user_id)){
    header('location:login.php');
   }
   
   if(isset($_POST['send'])){
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $number = mysqli_real_escape_string($conn, $_POST['number']);

      if(isset($_POST['msg'])){
         $msg = mysqli_real_escape_string($conn,$_POST['msg']); 

         $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id='$user_id' AND name='$name'  
         AND email='$email' AND number='$number' AND message='$msg'");

         if(mysqli_num_rows($select_message)>0){
            $messages[] = 'message sent already';
         }
         else{
            mysqli_query($conn,"INSERT INTO `message` (user_id,name,email,number,message) VALUES ('$user_id','$name','$email','$number','$msg')") 
            or die('query failed');
            $messages[] = 'message sent successfully!';
         }
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

   <?php
      if(isset($messages)){
         foreach($messages as $msg){
            echo '
            <div class="message">
               <span>'.$msg.'</span>
               <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
            </div>
            ';
         }
      }
   ?>

   <div class="heading">
       <h3>Contact us</h3>
       <p><a href="home.php">home</a>/contact</p>
   </div>

   <section class="contact">
      <h3 class="title">Get in touch</h3>
    <form action="" method="post">
      <input type="text" name="name" required placeholder="Enter your name" class="box">
      <input type="email" name="email" required placeholder="Enter your email" class="box">
      <input type="number" name="number" required placeholder="Enter your number" class="box">
      <textarea name="msg" class="box" placeholder="Enter your message"></textarea>
      <div class="button-container">
           <input type="submit" value="Send message" name="send" class="btn">
      </div>
    </form>
   </section>

   <?php
      include 'footer.php';
   ?>

   <script src="js/script.js"></script>
</body>
</html>
