<?php include('partials/header.php'); ?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="p-5 mb-4 card position-relative">
                        <h4 class="font-weight-bold text-gray-800 mb-4">Klient CSV</h4> <!-- Breadcrumb -->
                        <nav class="d-flex">
                            <h6 class="mb-0">
                                <a href="klient_CSV.php" class="text-reset" data-bs-placement="top"
                                    data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>">
                                    <u>Klient CSV</u>
                                </a>
                            </h6>
                        </nav>
                    </div>

                </div>
                <br>

                <div class="row gap-2">
                    <div class="col p-5 mb-4 card">
                        <h5>Ngarko CSV ne forme direkte</h5>
                        <hr>
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="csv_file" class="form-control" required>
                            <br>
                            <input type="submit" name="upload" value="Upload CSV"
                                class="btn btn-light border shadow-sm">
                            <a href="?clear=1" class="btn btn-danger">Clear</a>
                        </form>
                    </div>




                </div>
                <br>
                <div class="row">
                    <div class="col p-5 mb-4 card">
                        <p>Ju ngarkuat CSV-ne me keto te dhena</p>
                        <!-- <form method="post" enctype="multipart/form-data">
                            <input type="file" name="csv_file" class="form-control" required>
                            <br>
                            <input type="submit" name="upload" value="Upload CSV"
                                class="btn btn-light border shadow-sm">
                            <a href="?clear=1" class="btn btn-danger">Clear</a>
                        </form> -->

                        <?php
                        if (isset($_POST['upload'])) {
                            if ($_FILES['csv_file']['error'] == UPLOAD_ERR_OK && $_FILES['csv_file']['type'] == 'text/csv') {
                                // Open the uploaded file
                                $handle = fopen($_FILES['csv_file']['tmp_name'], 'r');

                                include('conn-d.php');
                                // Display the contents of the file in a table
                                echo '<br><br><table class="table border">';
                                while (($data = fgetcsv($handle)) !== false) {
                                    // Skip the first row
                                    if ($data[0] == 'Emri') {
                                        continue;
                                    }

                                    $emri = $conn->real_escape_string($data[0]);
                                    $mbiemri = $conn->real_escape_string($data[1]);
                                    $nr_personal = $conn->real_escape_string($data[2]);
                                    $email = $conn->real_escape_string($data[3]);

                                    $conn->query("INSERT INTO klientCSV (emri, mbiemri, nr_personal, email) VALUES ('$emri', '$mbiemri', '$nr_personal','$email')");


                                    echo '<tr>';
                                    foreach ($data as $value) {
                                        echo '<td>' . $value . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';

                                // Close the file
                                fclose($handle);
                            } else {
                                // Handle any errors that occurred during the upload process
                                // (e.g. file size limit exceeded, invalid file type, etc.)
                                // Redirect the user to an error page or display an error message
                                echo '<br><br><p style="color: red;">Error: Please upload a valid CSV file.</p>';
                            }
                        }
                        if (isset($_GET['clear']) && $_GET['clear'] == 1) {
                            unset($_SESSION['uploaded_file']);
                            exit();
                        }

                        ?>
                    </div>

                </div>

                <div class="row gap-2">
                    <div class="col p-5 mb-4 card">
                        <form method="post">
                            <label for="search_query">Search:</label>
                            <input type="text" id="search_query" name="search_query" class="form-control">
                            <br>
                            <button type="submit" name="search" class="btn btn-light border shadow-sm">Submit</button>
                        </form>
                        <?php if (isset($_POST['search'])) {
                            $search_query = $_POST['search_query'];
                            $sql = "SELECT * FROM klientCSV WHERE emri LIKE '%$search_query%'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo '<br><br><table class="table border">';
                                // Output the table headers
                                echo '<tr>';
                                echo '<th>Emri</th>';
                                echo '<th>Mbiemri</th>';
                                echo '<th>Numri personal</th>';
                                echo '<th>Email</th>';

                                // Add more headers for additional columns as needed
                                echo '</tr>';
                                // Output the table data
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['emri'] . '</td>';
                                    echo '<td>' . $row['mbiemri'] . '</td>';
                                    echo '<td>' . $row['nr_personal'] . '</td>';
                                    echo '<td>' . $row['email'] . '</td>';
                                    echo '</tr>';
                                }
                                echo '</table>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">No results found.</div>';

                            }
                        } ?>
                    </div>
                    <div class="col-4 p-5 mb-4 card">
                        <?php
                        $query = "SELECT COUNT(*) as count FROM klientCSV";
                        $result = mysqli_query($conn, $query);
                        $count = mysqli_fetch_assoc($result)['count'];
                        ?>
                        <canvas id="myChart"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('partials/footer.php'); ?>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',  // Change the type to 'pie'
            data: {
                labels: ['Count'],
                datasets: [{
                    label: 'Data Count',
                    data: [<?php echo $count; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>