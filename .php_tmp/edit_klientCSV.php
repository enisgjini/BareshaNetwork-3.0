<?php
// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Open the CSV file in read/write mode
        $handle = fopen(dirname(__FILE__) . '/data.csv', 'r+');

        // Loop through the rows of the file and find the row with the matching ID
        while (($data = fgetcsv($handle)) !== false) {
            if ($data[0] == $id) {
                // Replace the row with the updated data
                $data[1] = $_POST['field1'];
                $data[2] = $_POST['field2'];
                $data[3] = $_POST['field3'];

                // Seek to the beginning of the row and write the updated data
                fseek($handle, -strlen(implode(',', $data)), SEEK_CUR);
                fwrite($handle, implode(',', $data));

                // Close the file and redirect back to the table
                fclose($handle);
                header('Location: table.php');
                exit();
            }
        }

        // If the ID wasn't found, display an error message
        echo '<p>ID not found</p>';

    } else {
        // If the form hasn't been submitted, display the edit form

        // Open the CSV file in read-only mode
        if (($handle = fopen(dirname(__FILE__) . '/data.csv', 'r')) !== FALSE) {
            // Loop through the rows of the file and find the row with the matching ID
            while (($data = fgetcsv($handle)) !== false) {
                if ($data[0] == $id) {
                    // Display the edit form with the current data
                    echo '<form method="post">';
                    echo '<label>Field 1:</label><input type="text" name="field1" value="' . $data[1] . '"><br>';
                    echo '<label>Field 2:</label><input type="text" name="field2" value="' . $data[2] . '"><br>';
                    echo '<label>Field 3:</label><input type="text" name="field3" value="' . $data[3] . '"><br>';
                    echo '<input type="submit" name="submit" value="Save">';
                    echo '</form>';

                    // Close the file and stop looping
                    fclose($handle);
                    break;
                }
            }

            // If the ID wasn't found, display an error message
            echo '<p>ID not found</p>';

        } else {
            // If the file couldn't be opened, display an error message
            echo '<p>Error opening file</p>';
        }
    }
} else {
    // If the ID parameter isn't set, redirect back to the table
    header('Location: table.php');
    exit();
}