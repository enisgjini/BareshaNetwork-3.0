<?php
include('partials/header.php');
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="p-5 mb-4 card shadow-sm rounded-5">
                    <h4 class="font-weight-bold text-gray-800 mb-4">Lista e kontratave</h4>
                    <nav class="d-flex">
                        <h6 class="mb-0">
                            <a href="" class="text-reset">Kontrata</a>
                            <span>/</span>
                            <a href="lista_kontratave.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Lista e kontratave</u></a>
                        </h6>
                    </nav>
                </div>
                <div class="card shadow-sm rounded-5">
                    <div class="card-body">
                        <h4 class="card-title">Logs</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example" class="table w-100 table-bordered">
                                        <thead class="bg-light">
                                            <tr>

                                                <th>Emri</th>
                                                <th>Mbiemri</th>
                                                <th>Nr. i telefonit</th>
                                                <th>Numri personal</th>
                                                <th>Vepra</th>
                                                <th>Data</th>
                                                <th>Shenim</th>
                                                <th>Nenshkrimi</th>
                                                <th>Kontrata PDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $kueri = $conn->query("SELECT * FROM kontrata");
                                            while ($k = mysqli_fetch_array($kueri)) {
                                                

                                            ?>
                                                <tr>
                                                    <td><?php echo $k['emri']; ?></td>
                                                    <td><?php echo $k['mbiemri']; ?></td>
                                                    <td><?php echo $k['numri_i_telefonit']; ?></td>
                                                    <td><?php echo $k['numri_personal']; ?></td>
                                                    <td><?php echo $k['vepra']; ?></td>
                                                    <td><?php echo $k['data']; ?></td>
                                                    <td><?php echo $k['shenim']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($k['nenshkrimi'] == !null) {
                                                            echo '<span class="badge bg-success">Nenshkruar</span>';
                                                        } else {
                                                            echo '<span class="badge bg-danger">Nuk eshte nenshkruar</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="kontrata_pdf.php?id=<?php echo $k['id']; ?>" class="btn btn-primary btn-sm">Shiko</a>
                                                    </td>
                                                </tr>


                                            <?php } ?>
                                        </tbody>
                                        <tfoot class="bg-light">
                                            <tr>
                                                <th>Emri</th>
                                                <th>Mbiemri</th>
                                                <th>Nr. i telefonit</th>
                                                <th>Numri personal</th>
                                                <th>Vepra</th>
                                                <th>Data</th>
                                                <th>Shenim</th>
                                                <th>Nenshkrimi</th>
                                                <th>Kontrata PDF</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('partials/footer.php');
?>


<script>
    $('#example').DataTable({
        responsive: true,
        search: {
            return: true,
        },
        dom: 'Bfrtip',
        buttons: [{
            extend: 'pdfHtml5',
            text: '<i class="fi fi-rr-file-pdf fa-lg"></i>&nbsp;&nbsp; PDF',
            titleAttr: 'Eksporto tabelen ne formatin PDF',
            className: 'btn btn-light border shadow-2 me-2'
        }, {
            extend: 'copyHtml5',
            text: '<i class="fi fi-rr-copy fa-lg"></i>&nbsp;&nbsp; Kopjo',
            titleAttr: 'Kopjo tabelen ne formatin Clipboard',
            className: 'btn btn-light border shadow-2 me-2'
        }, {
            extend: 'excelHtml5',
            text: '<i class="fi fi-rr-file-excel fa-lg"></i>&nbsp;&nbsp; Excel',
            titleAttr: 'Eksporto tabelen ne formatin CSV',
            className: 'btn btn-light border shadow-2 me-2'
        }, {
            extend: 'print',
            text: '<i class="fi fi-rr-print fa-lg"></i>&nbsp;&nbsp; Printo',
            titleAttr: 'Printo tabelën',
            className: 'btn btn-light border shadow-2 me-2'
        }, {
            text: '<i class="fi fi-rr-user-add fa-lg"></i>&nbsp;&nbsp; Shto përdorues',
            className: 'btn btn-light border shadow-2 me-2',
            action: function(e, node, config) {
                $('#perdoruesiPopUp').modal('show')
            }
        }, ],
        initComplete: function() {
            var btns = $('.dt-buttons');
            btns.addClass('');
            btns.removeClass('dt-buttons btn-group');

        },
        fixedHeader: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/sq.json",
        },
        stripeClasses: ['stripe-color']
    })
</script>