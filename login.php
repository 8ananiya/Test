<?php

// Connect to the database 
$db = mysqli_connect("localhost", "username", "password", "database");

// Check if username exists
$query = "SELECT * FROM users WHERE username = '$username'";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

  // Get user data and verify password
  $row = mysqli_fetch_assoc($result);
  
  if (password_verify($password, $row['password'])) {
  
    // Password match, set session variables
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    
    header('Location: profile.php');
    
  } else {
    echo "Incorrect password.";
  }

} else {
  echo "User not found.";
}

?>