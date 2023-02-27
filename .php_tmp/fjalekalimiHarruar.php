<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Reset Password">
    </form>
    <?php
    // Start a session
    session_start();

    // Connect to the database
    include('conn-d.php');

    // Get the email address from the form submission
    $email = (isset($_POST['email']));

    // Check if the email address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email address';

    }

    // Check if the email address exists in the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        $_SESSION['error'] = 'Email address not found';

    }

    // Generate a new password and hash it with MD5
    $new_password = bin2hex(random_bytes(8));
    $new_password_hash = md5($new_password);

    // Update the user's password in the database
    $sql = "UPDATE users SET fjalkalimi='$new_password_hash' WHERE email='$email'";
    mysqli_query($conn, $sql);

    // Display the user's new password on the webpage
    echo 'Your new password is: ' . $new_password;

    // Redirect the user to a success page
    $_SESSION['success'] = 'Your new password has been generated';
   
    ?>

</body>

</html>