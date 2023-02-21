<?php


// $conn = new mysqli("198.38.83.75","bareshao_f","6D2?19slm","bareshao_f");
$conn = new mysqli("localhost", "root", "", "bareshao_f");

// Check connection
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}
?>