<?php

// Require login
session_start();
if (!isset($_SESSION['logged_in'])) {
  header('Location: login.php');
  exit;
}

// Get user data from database
$userId = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $userId";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

// Get appointments
$appointmentsQuery = "SELECT * FROM appointments WHERE user_id = $userId";
$appointmentsResult = mysqli_query($db, $appointmentsQuery);
$appointments = mysqli_fetch_all($appointmentsResult, MYSQLI_ASSOC);

// Return data as JSON
$data = [
  'user' => $user,
  'appointments' => $appointments
];

header('Content-Type: application/json');
echo json_encode($data);

?>