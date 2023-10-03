<?php
  include 'config.php';

  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmPassword =mysqli_real_escape_string($conn,$_POST['confirmPassword']);
    $user_type= $_POST['user_type'];

    $select_users = mysqli_query($conn,"SELECT * FROM `users` where email='$email' and password='$password'") or die('query failed');

    if(mysqli_num_rows($select_users) >0){
        $message[] = 'user already exist!';
    }else{
       if($password != $confirmPassword){
        $message[] = 'confirm password not matched!';
       }
       else{
        mysqli_query($conn,"insert into `users`(name,email,password,user_type) VALUES ('$name','$email','$confirmPassword','$user_type')") or die ('query failed');
        $message[] = 'registered successfully!';
        header('location:login.php');
        // The header('Location: login.php'); code is used to perform a server-side redirection to another web page. When this code is executed, 
        // the browser will be instructed to navigate to the specified URL, which, in this case, is login.php
       }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>

<?php
   if(isset($message)){
    foreach($message as $message){
        //  The period (.) is the concatenation operator in PHP. It is used to concatenate strings together. In this context,
        //  its used to concatenate the HTML markup and the message stored in the $message variable
        echo '
        <div class="message">
           <span>'.$message.'</span>
           <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
        </div>
         ';
    }
   }
?>

<div class="form-container">
        <form action="" method="post">
            <h3>Register now!</h3>
            <input type="text" name="name"  placeholder="Enter your name" required class="box">
            <input type="email" name="email"  placeholder="Enter your email" required class="box">
            <input type="password" name="password"  placeholder="Enter your password" required class="box">
            <input type="password" name="confirmPassword"  placeholder="Confirm your password" required class="box">
            <select name="user_type" class="box">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Register now" class="btn">
            <p>already have an account? <a href="login.php">Login now</a></p>
        </form>
    </div>
</body>
</html>