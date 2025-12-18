<?php
session_start();
include "db.php";

$api_key = trim($_POST['api_key']);
$refresh_token = trim($_POST['refresh_token']);

// 🔍 Check if user already exists
$checkQuery = "SELECT id FROM users WHERE api_key = '$api_key' LIMIT 1";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    // ✅ User exists → login
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];

} else {
 header("Location: ../index.php");
}

// 🚀 Redirect to dashboard
header("Location: ../dashboard.php");
exit;
