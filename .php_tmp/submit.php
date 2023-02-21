<?php $name = $_POST['name'];
$signature = $_POST['signature'];

// Insert the data into the database
$sql = "INSERT INTO signatures (name, signature) VALUES ('$name', '$signature')";

if ($conn->query($sql) === TRUE) {
    echo "Signature saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>