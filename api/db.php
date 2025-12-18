<?php
$conn = mysqli_connect("localhost", "db_atom", "enter_pass", "user_atom");
if (!$conn) {
  die("DB Connection Failed");
}

