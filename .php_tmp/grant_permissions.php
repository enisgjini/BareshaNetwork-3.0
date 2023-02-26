<?php include 'conn-d.php'; ?>
<?php 
    $user = $_POST['user'];
    $logs_access = isset($_POST['logs']) ? 1 : 0;
  
    // Grant permissions to the selected user for "logs.php"
    mysqli_query($conn, "UPDATE users SET logs_access = $logs_access WHERE name = '$user'");
  
?>