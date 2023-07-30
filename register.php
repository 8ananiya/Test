<?php

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Validate input
// ...

// Hash password 
$hashed_pass = password_hash($password, PASSWORD_DEFAULT);

// Connect to database
$conn = mysqli_connect("localhost", "username", "password", "db");

// Check if username exists
$query = "SELECT * FROM users WHERE username = '$username'";

if (mysqli_num_rows(mysqli_query($conn, $query)) > 0) {
  echo "Username already exists!";
  exit();
}

// Insert user into database 
$query = "INSERT INTO users VALUES ('', '$name', '$email', '$username', '$hashed_pass')";

mysqli_query($conn, $query);

// Redirect to login page
header('Location: login.php');

?>