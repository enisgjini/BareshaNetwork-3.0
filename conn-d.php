<?php
$conn = new mysqli("198.38.83.75","bareshao_f","sk9_b64N4","bareshao_f");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>