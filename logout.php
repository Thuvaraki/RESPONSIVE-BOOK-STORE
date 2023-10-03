<?php
  include 'config.php';
  session_start();
  session_unset();
  session_destroy();

  header('location:login.php');
?>

<!-- session_start();: This function starts a new or resumes an existing session in PHP. Sessions are used to store and manage user data across multiple 
pages or requests.

session_unset();: This function is used to unset (clear) all the session variables. It effectively clears any data that has been set in the session but 
does not destroy the session itself.

session_destroy();: This function is used to destroy the current session. It removes all session data and essentially logs the user out -->