<?php
// Connect to the database
include_once('conn-d.php');

if (isset($_POST['submit'])) {
    // Get the values of the form inputs
    $id = $_POST['id'];
    $note = $_POST['note'];
    $date = $_POST['date'];

    // Update the note in the database
    $sql = "UPDATE shenime SET shenimi = '$note', data = '$date' WHERE id = '$id'";
    mysqli_query($conn, $sql);

    // Redirect back to the index page
    header("Location: notes.php");
    exit();
} else {
    // Get the ID of the note to be edited
    $id = $_GET['id'];

    // Fetch the note from the database
    $sql = "SELECT * FROM shenime WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Display the form to edit the note
    echo '<form action="edit_note.php" method="post">
    <div class="form-group">
        <label for="note">Note:</label>
        <input type="text" class="form-control" id="note" name="note" value="' . $row['shenimi'] . '">
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" value="' . $row['data'] . '">
    </div>
    <input type="hidden" name="id" value="' . $row['id'] . '">
    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
    </form>';
}
?>
