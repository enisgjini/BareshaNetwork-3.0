<?php include 'partials/header.php'; ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">
        <div class="p-5 shadow-sm rounded-5 mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Pagesat e kryera</h4> <!-- Breadcrumb -->
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Financat</a>
              <span>/</span>
              <a href="pagesat.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Pagesat e kryera</u></a>
            </h6>
          </nav>
        </div>

        <div class="card shadow-sm rounded-5 my-2 py-5 px-3 mb-4">

          <form method="GET" action="" class="form-inline">
            <div class="form-group row">
              <div class="col-12">
                Prej :
                <input type="date" class="form-control w-100 mt-3 mb-3" value="<?php echo date("Y-m-d"); ?>" style="width: 230px;" name="d1" autocomplete="off">
              </div>
              <div class="col-12">
                Deri :
                <input type="date" class="form-control w-100 mt-3 mb-3" value="<?php echo date("Y-m-d"); ?>" style="width: 230px;" name="d2" autocomplete="off">
              </div>

            </div>
            <div class="row">
              <div class="col-6 my-3">
                <button type="submit" class="btn btn-outline-primary" name="kerko" value="Kerko"><i class="fi fi-rr-search"></i>
                  Kërko</button>
              </div>
            </div>
          </form>
        </div>




        <?php
        if (isset($_GET['kerko'])) {
          $d1 = $_GET['d1'];
          $d2 = $_GET['d2'];
          $merri = $conn->query("SELECT * FROM pagesat WHERE data >= '$d1' AND data <= '$d2' ORDER BY data DESC");
        ?>
          <div class="card shadow-sm rounded-5">
            <div class="card-body">
              <h4 class="card-title">Tabela e gjeneruar ne bazë të datave <?php echo $d1; ?> - <?php echo $d2; ?></h4>
              <div class="row">
                <div class="col-12">
                  <br>
                  <div class="table-responsive">

                    <table id="example1" class="table w-100 border">
                      <thead class="bg-light">
                        <tr>
                          <th>Klienti</th>
                          <th>Fatura</th>
                          <th>Pershkrimi</th>
                          <th>Shuma</th>
                          <th>Menyra</th>
                          <th>Data</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (mysqli_num_rows($merri) > 0) { ?>
                          <?php while ($k = mysqli_fetch_array($merri)) {
                            $nrfatures = $k['fatura'];
                            $merremrin = $conn->query("SELECT * FROM fatura WHERE fatura='$nrfatures'");
                            $dhenat = mysqli_fetch_array($merremrin);
                            if ($dhenat != null) {
                              $cliidi = $dhenat['emri'];
                              $merremrin2 = $conn->query("SELECT * FROM klientet WHERE id='$cliidi'");
                              $dhena = mysqli_fetch_array($merremrin2);
                            }
                          ?>
                            <tr>
                              <th><?php echo $dhena['emri']; ?></th>
                              <td><?php echo $k['fatura']; ?></td>
                              <td><?php echo $k['pershkrimi']; ?></td>
                              <td><?php echo $k['shuma']; ?></td>
                              <td><?php echo $k['menyra']; ?></td>
                              <td><?php echo date("d-m-Y", strtotime($k['data'])); ?></td>
                              <td><a class="btn btn-success btn-sm" target="_blank" href="fatura.php?invoice=<?php echo $k['fatura']; ?>"></a></td>
                            </tr>
                          <?php } ?>
                        <?php } else { ?>
                          <tr>
                            <td colspan="7" align="center">No data here</td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <br>

        <div class="card shadow-sm rounded-5">
          <div class="card-body">
            <h4 class="card-title">Tabela me te gjitha te dhenat rreth perfundimit te pagesave</h4>
            <div class="row">
              <div class="col-12">
                <br>
                <label for="searchInput">Kërkoni: </label>
                <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control w-25" />
                <br>
                <div class="table-responsive">

                  <?php
                  $merri = $conn->query("SELECT * FROM pagesat ORDER BY data DESC");
                  ?>
                  <table id="example2" class="table w-100 border">
                    <thead class="bg-light">
                      <tr>
                        <th>Klienti</th>
                        <th>Fatura</th>
                        <th>Pershkrimi</th>
                        <th>Shuma</th>
                        <th>Menyra</th>
                        <th>Data</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($k = mysqli_fetch_array($merri)) {
                        $nrfatures = $k['fatura'];
                        $merremrin = $conn->query("SELECT * FROM fatura WHERE fatura='$nrfatures'");
                        $dhenat = mysqli_fetch_array($merremrin);
                        if ($dhenat != null) {
                          $cliidi = $dhenat['emri'];
                          $merremrin2 = $conn->query("SELECT * FROM klientet WHERE id='$cliidi'");
                          $dhena = mysqli_fetch_array($merremrin2);
                      ?>
                          <tr>
                            <td><?php echo $dhena['emri']; ?></td>
                            <td><?php echo $k['fatura']; ?></td>
                            <td><?php echo $k['pershkrimi']; ?></td>
                            <td><?php echo $k['shuma']; ?></td>
                            <td><?php echo $k['menyra']; ?></td>
                            <td><?php echo date("d-m-Y", strtotime($k['data'])); ?></td>
                            <td> <a class="btn btn-light shadow-2 border border-1" target="_blank" href="fatura.php?invoice=<?php echo $k['fatura']; ?>"><i class="fi fi-rr-print"></i></a>
                            </td>
                          </tr>
                      <?php
                        }
                      }
                      ?>

                    </tbody>
                    <tfoot class="bg-light">
                      <tr>
                        <th>Klienti</th>
                        <th>Fatura</th>
                        <th>Pershkrimi</th>
                        <th>Shuma</th>
                        <th>Menyra</th>
                        <th>Data</th>
                        <th></th>
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
</div>

<?php include 'partials/footer.php'; ?>
<script>
  $('#example1').DataTable({
    responsive: true,
    search: {
      return: true,
    },
    dom: 'Bfrtip',
    buttons: [{
      extend: 'pdfHtml5',
      text: '<i class="fi fi-rr-file-pdf fa-lg"></i>&nbsp;&nbsp; PDF',
      titleAttr: 'Eksporto tabelen ne formatin PDF',
      className: 'btn btn-light border shadow-2 me-2',
      filename: 'Pagesat e kryera gjate:  <?php echo $d1; ?> - <?php echo $d2; ?>',
      title: "Pagesat e kryera gjate periudhes <?php echo $d1; ?> - <?php echo $d2; ?> ne formatin PDF"
    }, {
      extend: 'copyHtml5',
      text: '<i class="fi fi-rr-copy fa-lg"></i>&nbsp;&nbsp; Kopjo',
      titleAttr: 'Kopjo tabelen ne formatin Clipboard',
      className: 'btn btn-light border shadow-2 me-2',
      filename: 'Pagesat e kryera gjate:  <?php echo $d1; ?> - <?php echo $d2; ?>',
    }, {
      extend: 'excelHtml5',
      text: '<i class="fi fi-rr-file-excel fa-lg"></i>&nbsp;&nbsp; Excel',
      titleAttr: 'Eksporto tabelen ne formatin CSV',
      className: 'btn btn-light border shadow-2 me-2',
      filename: 'Pagesat e kryera gjate:  <?php echo $d1; ?> - <?php echo $d2; ?>',
      title: "Pagesat e kryera gjate periudhes <?php echo $d1; ?> - <?php echo $d2; ?> ne formatin Excel"
    }, {
      extend: 'print',
      text: '<i class="fi fi-rr-print fa-lg"></i>&nbsp;&nbsp; Printo',
      titleAttr: 'Printo tabelën',
      className: 'btn btn-light border shadow-2 me-2',
      filename: 'Pagesat e kryera gjate:  <?php echo $d1; ?> - <?php echo $d2; ?>',
      title: "Pagesat e kryera gjate periudhes <?php echo $d1; ?> - <?php echo $d2; ?>"
    }],
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
<script>
  function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("example2");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            td.innerHTML = txtValue.replace(new RegExp(filter, 'gi'), '<span style="color: red;font-weight:bold;font-size:16px">$&</span>');

            tr[i].style.display = "";

            break;
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  }
</script>