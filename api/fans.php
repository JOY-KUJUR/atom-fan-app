<?php
include "db.php";
session_start();

$user_id = $_SESSION['user_id'];
$res = mysqli_query($conn, "SELECT * FROM fans WHERE user_id=$user_id");

echo json_encode(mysqli_fetch_all($res, MYSQLI_ASSOC));
