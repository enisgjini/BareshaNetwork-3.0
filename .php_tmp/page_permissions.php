<?php include 'partials/header.php'; ?>

<body>
    <div class="container m-2">


        <div class="card p-5">
            <h2>Select User to Grant Permissions</h2>
            <br>
            <form method="POST" action="grant_permissions.php">
                <select name="user" class="form-select">
                    <?php
                    // Execute the SQL query
                    $result = mysqli_query($conn, "SELECT * FROM users");

                    // Generate the <option> tags
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option class="form-control" value="' . $row['name'] . '">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
                <br><br>
                <label for="logs">logs.php</label>
                <input type="checkbox" name="logs" id="logs" value="1">
                <br><br>
                <input type="submit" value="Grant Permissions">
            </form>
        </div>

    </div>
</body>

</html>