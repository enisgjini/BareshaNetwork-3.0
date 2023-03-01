<?php include('partials/header.php');
include('conn-d.php') ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card p-4">
                            <h3>To do</h3>
                            <form method="POST" action="add-task.php">
                                <div class="row ">
                                    <div class="col">
                                        <input type="text" name="task" placeholder="Sheno detyren" class="form-control">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="label" placeholder="Sheno etiketën"
                                            class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <input type="date" name="due_date" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-light border border-1 shadow">Shto</button>
                            </form>
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <div class="card p-4">
                            <?php
                            $result = mysqli_query($conn, "SELECT id,detyra, etiketa, data FROM detyra");

                            echo "<div class='row'><table class='table border w-100'>
                        <thead class='bg-light'";
                            echo "<tr><th>Detyra</th><th>Etiketa</th><th>Data</th><th></th></tr></thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["detyra"] . "</td>";
                                echo "<td>" . $row["etiketa"] . "</td>";
                                echo "<td>" . $row["data"] . "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-primary btn-sm'  href=\"edit-task.php?id=" . $row["id"] . "\"><i class='fi fi-rr-edit'></i></a> ";
                                echo "<a class='btn btn-danger border border-1 shadow-1 btn-sm' href='#' onclick='showConfirmDialog(" . $row['id'] . ")'> <i class='fi fi-rr-trash'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table></div>";

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function showConfirmDialog(id) {
        Swal.fire({
            title: 'A jeni i sigurt?',
            text: "Nuk do të mund ta kthesh këtë!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Po, fshijeni!',
            cancelButtonText: 'Jo, anuloje',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Duke fshirë...',
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                setTimeout(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'U fshi!',
                        text: 'Skedari juaj është fshirë.',
                        timer: 3000
                    });
                    window.location.href = 'delete-task.php?id=' + id;
                }, 2000);
            }

        })
    }
</script>






<?php include('partials/footer.php'); ?>