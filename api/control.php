<?php
include "db.php";

$fan_id = $_POST['fan_id'];
$action = $_POST['action'];
$value = $_POST['value'];

if ($action === "power") {
  mysqli_query($conn, "UPDATE fans SET is_on=$value WHERE id=$fan_id");
}

if ($action === "speed") {
  mysqli_query($conn, "UPDATE fans SET speed=$value WHERE id=$fan_id");
}

if ($action === "sleep") {
  mysqli_query($conn, "UPDATE fans SET sleep_mode=$value WHERE id=$fan_id");
}

echo json_encode(["status" => "ok"]);
